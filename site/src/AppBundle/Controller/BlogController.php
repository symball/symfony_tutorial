<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

// Include functionality for form submission
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// Include the Data Entity
use AppBundle\Entity\Comment;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog_index")
     */
    public function indexAction()
    {
      // Select the appropriate entity as a source
      $posts = $this->get('app.service.blog_manager')->fetchPosts();

      // Quick way to debug information from the controller
      // dump($posts);
      // die();

      return $this->render("blog/index.html.twig", ["posts" => $posts]);

    }
    /**
     * @Route("/blog/{id}", name="blog_singular")
     */
     public function singularAction($id, Request $request)
     {
       /* Form definition */
       $post = $this->get('app.service.blog_manager')->fetchPost($id);

       // Prepare a data object for use with the form
       $comment = new Comment();
       $form = $this->createFormBuilder($comment)
         ->add('email')
         ->add('body')
         // Submit isn't part of data object so we add it
         ->add('save', SubmitType::class, array('label' => 'Submit comment'))
         ->getForm();

       // Get Symfony to parse the form
       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid())
       {

         /* Set some comment properties */
         $comment->setPost($post);
         $comment->setCreatedAt(new \DateTime());

         // Save the comment
         $em = $this->getDoctrine()->getManager();
         $em->persist($comment);
         $em->flush();

         $request->getSession()->getFlashBag()
         ->add("alerts", array(
           "type" => "success",
           "message" => "Thanks for submitting some feedback!"));
       }

       return $this->render('blog/singular.html.twig', array(
         'post' => $post,
         'comment_form' => $form->createView(),
       ));

     }
}

