<?php
 
namespace AppBundle\Event;

/* The event we'll be extending */
use Symfony\Component\EventDispatcher\Event;
use AppBundle\Entity\Post;

class PostFetchedEvent extends Event
{
    /* This is the internal reference for the event name */
    const NAME = 'post.fetched';

    /* Listeners will be extending this class so, we use protected */
    protected $post;

    /* Cast the post to object property on initiation */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /*
    * Any methods contained within the event are available
    * to the event listeners / subscribers
    */
    public function getPost()
    {
        return $this->post;
    }
}

