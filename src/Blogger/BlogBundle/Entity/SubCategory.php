<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubCategory
 *
 * @ORM\Table(name="sub_category", indexes={@ORM\Index(name="IDX_BCE3F798DAE07E97", columns={"blog_id"})})
 * @ORM\Entity
 */
class SubCategory
{
    /**
     * @var string
     *
     * @ORM\Column(name="sub_category", type="string", length=100, nullable=true)
     */
    private $subCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sub_category_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Blogger\BlogBundle\Entity\Blog
     *
     * @ORM\ManyToOne(targetEntity="Blogger\BlogBundle\Entity\Blog", inversedBy="sub_category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="blog_id", referencedColumnName="id")
     * })
     */
    private $blog;



    /**
     * Set subCategory
     *
     * @param string $subCategory
     *
     * @return SubCategory
     */
    public function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    /**
     * Get subCategory
     *
     * @return string
     */
    public function getSubCategory()
    {
        return $this->subCategory;
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
     * Set blog
     *
     * @param \Blogger\BlogBundle\Entity\Blog $blog
     *
     * @return SubCategory
     */
    public function setBlog(\Blogger\BlogBundle\Entity\Blog $blog = null)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return \Blogger\BlogBundle\Entity\Blog
     */
    public function getBlog()
    {
        return $this->blog;
    }
}
