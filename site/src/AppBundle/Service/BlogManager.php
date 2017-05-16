<?php

namespace AppBundle\Service;

/* Include namespaces for type casting */
use Doctrine\Common\Persistence\ObjectRepository;

class BlogManager
{
  protected $postRepository;

  /* Notice the type forcing of the argument */
  public function __construct(ObjectRepository $postRepository)
  {
    $this->postRepository = $postRepository;
  }
  public function fetchPosts()
  {
    return $this->postRepository->findAll();
  }
  public function fetchPost($id)
  {
    return $this->postRepository->find($id);
  }
}