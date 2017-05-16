<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

// Return a Symfony simple HTTP response without template
use Symfony\Component\HttpFoundation\Response;
// Include the post data class
use AppBundle\Entity\Post;

class TestController extends Controller
{
    /**
     * @Route("/test", name="test")
     */
    public function indexAction()
    {
      /* Use the service container to retrieve the blog manager */
      $blogManager = $this->get('app.service.blog_manager');

      /* Return the output of test function as a response */
      return new Response(dump($blogManager->fetchPosts()));
    }
}

