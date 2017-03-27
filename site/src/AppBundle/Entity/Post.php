<?php
namespace AppBundle\Entity;
// # src/AppBundle/Entity/Post.php
// Autoload the annotations for Data definition
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
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
    * @ORM\Column(type="datetime", name="created_at")
    */
   private $createdAt;
   /**
   * @ORM\OneToMany(targetEntity="Comment", mappedBy="post")
   */
   private $comments;
   /**
    * @ORM\Column(type="integer", options={"default" : 0})
    */
   private $accessCounter;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Post
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Post
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set accessCounter
     *
     * @param integer $accessCounter
     *
     * @return Post
     */
    public function setAccessCounter($accessCounter)
    {
        $this->accessCounter = $accessCounter;

        return $this;
    }

    /**
     * Get accessCounter
     *
     * @return integer
     */
    public function getAccessCounter()
    {
        return $this->accessCounter;
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return Post
     */
    public function addComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comment $comment
     */
    public function removeComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
