<?php

namespace Tests\AppBundle\Unit\Entity;

/* The base PHPUnit test class */
use PHPUnit\Framework\TestCase;
/* Our post entity data class */
use AppBundle\Entity\Post;
/* The Symfony validation component */
use Symfony\Component\Validator\Validation;

/* Extend the default PHPUnit test case */
class PostTest extends TestCase
{
    /* Property for storing Symfony validation object */
    private $validator;

    /* Function to be run prior to every test */
    public function setUp()
    {
      /* Assign an instance of the validator component to object */
      $this->validator = Validation::createValidatorBuilder()
        ->enableAnnotationMapping()
        ->getValidator();
    }
    /* Test that posts can be instantiated */
    public function testCreation()
    {
        /* Create a post */
        $post = new Post();
        /* Check that it is an object type */
        $this->assertEquals(true, is_object($post));
    }

    /* Test a typical type of data */
    public function testTypicalTitle()
    {
      /* Create a post */
      $post = new Post();
      $post->setTitle('Typical Title');
      /* Check that it is an object type */
      $this->assertEquals('Typical Title', $post->getTitle());
    }

    /* Test erroneous title */
    public function testEmptyTitle()
    {
      $post = new Post();

      /* Perform validation on the object */
      $errors = $this->validator->validate($post);

      /* Contains checks for the presence of a value within a data set */
      $this->assertContains('AppBundle\Entity\Post).title:
    This value should not be blank.', (string) $errors);
    }

    /* Test erroneous title */
    public function testInvalidTitle()
    {
      $post = new Post();

      /* Perform validation on the object */
      $errors = $this->validator->validate($post);

      /* Contains checks for the presence of a value within a data set */
      $this->assertContains('AppBundle\Entity\Post).title:
    This value should not be blank.', (string) $errors);
    }

}
