<?php
// # src/AppBundle/Controller/BlogController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

// Include the Data Entity
use AppBundle\Entity\Comment;
// Include functionality for form submission
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog_index")
     */
    public function indexAction()
    {
      $posts = $this->get('app.service.blog_manager')
      ->fetchPosts();

      return $this->render("blog/index.html.twig", ["posts" => $posts]);

    }

    /**
     * @Route("/blog/{id}", name="blog_singular")
     */
    public function singularAction($id, Request $request)
    {
      $post = $this->get('app.service.blog_manager')
      ->fetchPost($id);

      // Prepare a data object for use with the form
      $comment = new Comment();
      $comment->setPost($post);
      $comment->setCreatedAt(new \DateTime());

      // The field types here are autoguessed form the data object
      $form = $this->createFormBuilder($comment)
      ->add('email')
      ->add('body')
      // Submit isn't part of data object so we add it
      ->add('save', SubmitType::class, array('label' => 'Submit comment'))
      ->getForm();

      // Get Symfony to parse the form
      $form->handleRequest($request);

      // Check if the form has been submitted and passed validation
      if ($form->isSubmitted() && $form->isValid()) {
        // Save the comment
        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();

        $flashBag = $this->get("session")->getFlashBag();
        $flashBag->add("alerts", "Thanks for submitting some feedback!");

      }

      return $this->render('blog/singular.html.twig', array(
        'post' => $post,
        // Pass the view object to the template
        'comment_form' => $form->createView(),
      ));
    }
}
