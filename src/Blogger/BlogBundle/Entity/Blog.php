<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="blog", indexes={@ORM\Index(name="IDX_C0155143E2544CD6", columns={"author_user_id"})})
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Repositories\BlogRepository")
 */
class Blog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blog_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="raw_blog", type="text", nullable=true)
     */
    private $rawBlog;

    /**
     * @var string
     *
     * @ORM\Column(name="blog", type="text", nullable=true)
     */
    private $blog;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean", nullable=true)
     */
    private $published;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="published_time", type="datetime", nullable=true)
     */
    private $publishedTime;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author_user_id", referencedColumnName="id")
     * })
     */
    private $authorUser;

    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
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
     * @return Blog
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
     * Set rawBlog
     *
     * @param string $rawBlog
     *
     * @return Blog
     */
    public function setRawBlog($rawBlog)
    {
        $this->rawBlog = $rawBlog;

        return $this;
    }

    /**
     * Get rawBlog
     *
     * @return string
     */
    public function getRawBlog()
    {
        return $this->rawBlog;
    }

    /**
     * Set blog
     *
     * @param string $blog
     *
     * @return Blog
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return string
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Blog
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Blog
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Blog
     */
    public function setPublished($published)
    {
         if(!$this->published && $published) {
            $this->setPublishedTime(new \DateTime());
        }

        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set publishedTime
     *
     * @param \DateTime $publishedTime
     *
     * @return Blog
     */
    public function setPublishedTime($publishedTime)
    {
        $this->publishedTime = $publishedTime;

        return $this;
    }

    /**
     * Get publishedTime
     *
     * @return \DateTime
     */
    public function getPublishedTime()
    {
        return $this->publishedTime;
    }

    /**
     * Set authorUser
     *
     * @param \Blogger\BlogBundle\Entity\Users $authorUser
     *
     * @return Blog
     */
    public function setAuthorUser(\Blogger\BlogBundle\Entity\Users $authorUser = null)
    {
        $this->authorUser = $authorUser;

        return $this;
    }

    /**
     * Get authorUser
     *
     * @return \Blogger\BlogBundle\Entity\Users
     */
    public function getAuthorUser()
    {
        return $this->authorUser;
    }
}
