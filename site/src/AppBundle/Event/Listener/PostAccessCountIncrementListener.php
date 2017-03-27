<?php

namespace AppBundle\Event\Listener;

/* Include namespaces for type enforcement */
use Doctrine\ORM\EntityManager;
use AppBundle\Event\PostFetchedEvent;

class PostAccessCountIncrementListener
{
    private $entityManager;

    /* Set the entity manager to object */
    public function __construct(EntityManager $entityManager)
    {
      $this->entityManager = $entityManager;
    }

    /* The method that will be called */
    public function onPostFetched(PostFetchedEvent $event)
    {

        /* Get the post from the event */
        $post = $event->getPost();

        /* Increment the access counter */
        $newCountValue = $post->getAccessCounter() + 1;
        $post->setAccessCounter($newCountValue);

        /* Save the changes */
        $this->entityManager->flush();
    }
}
