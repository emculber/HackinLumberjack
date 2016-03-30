<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Entity\Repository\BlogRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Blog
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=100, nullable=true)
     */
    private $author;

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
     * @ORM\OneToMany(targetEntity="Blogger\BlogBundle\Entity\Tags", mappedBy="blog", cascade={"remove"})
     */
    protected $tags;

    /**
     * @ORM\OneToMany(targetEntity="Blogger\BlogBundle\Entity\Category", mappedBy="blog", cascade={"remove"})
     */
    protected $category;

    /**
     * @ORM\OneToMany(targetEntity="Blogger\BlogBundle\Entity\SubCategory", mappedBy="blog", cascade={"remove"})
     */
    protected $sub_category;

    /**
     * @ORM\OneToMany(targetEntity="Blogger\BlogBundle\Entity\Contributers", mappedBy="blog", cascade={"remove"})
     */
    protected $contributers;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blog_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue()
    {
       $this->setUpdated(new \DateTime());
    }

    public function __toString()
    {
        return $this->getTitle();
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
     * Set author
     *
     * @param string $author
     *
     * @return Blog
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add tag
     *
     * @param \Blogger\BlogBundle\Entity\Tags $tag
     *
     * @return Blog
     */
    public function addTag(\Blogger\BlogBundle\Entity\Tags $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Blogger\BlogBundle\Entity\Tags $tag
     */
    public function removeTag(\Blogger\BlogBundle\Entity\Tags $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add category
     *
     * @param \Blogger\BlogBundle\Entity\Category $category
     *
     * @return Blog
     */
    public function addCategory(\Blogger\BlogBundle\Entity\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Blogger\BlogBundle\Entity\Category $category
     */
    public function removeCategory(\Blogger\BlogBundle\Entity\Category $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add subCategory
     *
     * @param \Blogger\BlogBundle\Entity\SubCategory $subCategory
     *
     * @return Blog
     */
    public function addSubCategory(\Blogger\BlogBundle\Entity\SubCategory $subCategory)
    {
        $this->sub_category[] = $subCategory;

        return $this;
    }

    /**
     * Remove subCategory
     *
     * @param \Blogger\BlogBundle\Entity\SubCategory $subCategory
     */
    public function removeSubCategory(\Blogger\BlogBundle\Entity\SubCategory $subCategory)
    {
        $this->sub_category->removeElement($subCategory);
    }

    /**
     * Get subCategory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubCategory()
    {
        return $this->sub_category;
    }

    /**
     * Add contributer
     *
     * @param \Blogger\BlogBundle\Entity\Contributers $contributer
     *
     * @return Blog
     */
    public function addContributer(\Blogger\BlogBundle\Entity\Contributers $contributer)
    {
        $this->contributers[] = $contributer;

        return $this;
    }

    /**
     * Remove contributer
     *
     * @param \Blogger\BlogBundle\Entity\Contributers $contributer
     */
    public function removeContributer(\Blogger\BlogBundle\Entity\Contributers $contributer)
    {
        $this->contributers->removeElement($contributer);
    }

    /**
     * Get contributers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContributers()
    {
        return $this->contributers;
    }
}
