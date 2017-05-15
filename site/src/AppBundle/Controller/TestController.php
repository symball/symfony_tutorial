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
      // Get the entity manager which will handle the save operation
      $em = $this->getDoctrine()->getManager();

      // Pay attention to the slash, make use of global namespace
      $currentTime = new \DateTime();

      // Create a post
      $post = new Post();
      $post->setTitle('First Post');
      $post->setCreatedAt($currentTime);
      $post->setSummary('A first post test');
      $post->setContent('<p>lorem ipsum...</p>');

      // Inform the entity manager that the post object is for saving
      $em->persist($post);

      // Create a second post
      $post = new Post();
      $post->setTitle('Second Post');
      $post->setCreatedAt($currentTime);
      $post->setSummary('A second post test');
      $post->setContent('<p>lorem ipsum</p>');

      // Inform the entity manager that the post object is for saving
      $em->persist($post);

      // Perform the actual database operation
      $em->flush();

      return new Response('Entities have been saved to the DB');
    }
}

