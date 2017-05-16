<?php

namespace AppBundle\Repository;

/* The base Doctrine repository class */
use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
  public function findAll($sortOrder = 'DESC')
  {
    return $this->createQueryBuilder('p')
      ->select(array(
        'p.id',
        'p.title',
        'p.summary',
        'p.createdAt'
      ))
      ->orderBy('p.createdAt', $sortOrder)
      ->getQuery()
      ->execute();
  }
}

