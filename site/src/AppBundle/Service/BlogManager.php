<?php

namespace AppBundle\Service;
 
use Doctrine\Common\Persistence\ObjectRepository;

/* Include namespaces for type casting */
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/* Include the event definition */
use AppBundle\Event\PostFetchedEvent;


class BlogManager
{
  protected $postRepository;

  /* The event dispatcher interface */
  protected $eventDispatcher;

  /* Notice the type forcing of the argument */
  public function __construct(
    ObjectRepository $postRepository,
    EventDispatcherInterface $eventDispatcher)
  {
    $this->postRepository = $postRepository;

    /* Set the event dispatcher to an object property */
    $this->eventDispatcher = $eventDispatcher;
  }
  public function fetchPosts()
  {
    return $this->postRepository->findAllOrderedByDate();
  }
  public function fetchPost($id)
  {
    if($post = $this->postRepository->find($id))
    {
      /* Inform the Symfony event listener that there is an event here */
      $event = new PostFetchedEvent($post);
      $this->eventDispatcher->dispatch(PostFetchedEvent::NAME, $event);
      return $post;
    }
  }
}

