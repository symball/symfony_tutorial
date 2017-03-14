<?php
// # src/AppBundle/Controller/BlogController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog_index")
     */
    public function indexAction()
    {
      // Select the appropriate entity as a source
      $posts = $this->getDoctrine()
      ->getRepository('AppBundle:Post')
      // Use one of the built in methods
      ->findAll();

      return $this->render("blog/index.html.twig", ["posts" => $posts]);

    }

    /**
     * @Route("/blog/{id}", name="blog_singular")
     */
    public function singularAction($id)
    {
      $post = $this->getDoctrine()
      ->getRepository('AppBundle:Post')
      ->find($id);

      // replace this example code with whatever you need
      return $this->render('blog/singular.html.twig', ['post' => $post]);
    }
}
