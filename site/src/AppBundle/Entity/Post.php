<?php
namespace AppBundle\Entity;

// Autoload the annotations for Data definition
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="post")
*/
class Post
{
   /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
   private $id;
   /**
    * @ORM\Column(type="string", length=155)
    */
   private $title;
   /**
    * @ORM\Column(type="string", length=300)
    */
   private $summary;
   /**
    * @ORM\Column(type="text")
    */
   private $content;
   /**
    * @ORM\Column(type="datetime")
    */
   private $createdAt;
   /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post", orphanRemoval=true)
     */
   protected $comments;
   /**
    * @ORM\Column(type="integer", options={"default" : 0})
    */
   private $accessCounter = 0;
}
