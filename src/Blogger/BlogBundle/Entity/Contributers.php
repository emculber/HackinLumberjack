<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contributers
 *
 * @ORM\Table(name="contributers", indexes={@ORM\Index(name="IDX_7F45E7B4DAE07E97", columns={"blog_id"}), @ORM\Index(name="IDX_7F45E7B4758383F6", columns={"contributer_user_id"})})
 * @ORM\Entity
 */
class Contributers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contributers_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contribute_time", type="datetime", nullable=true)
     */
    private $contributeTime;

    /**
     * @var \Blog
     *
     * @ORM\ManyToOne(targetEntity="Blog")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="blog_id", referencedColumnName="id")
     * })
     */
    private $blog;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contributer_user_id", referencedColumnName="id")
     * })
     */
    private $contributerUser;



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
     * Set contributeTime
     *
     * @param \DateTime $contributeTime
     *
     * @return Contributers
     */
    public function setContributeTime($contributeTime)
    {
        $this->contributeTime = $contributeTime;

        return $this;
    }

    /**
     * Get contributeTime
     *
     * @return \DateTime
     */
    public function getContributeTime()
    {
        return $this->contributeTime;
    }

    /**
     * Set blog
     *
     * @param \Blogger\BlogBundle\Entity\Blog $blog
     *
     * @return Contributers
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

    /**
     * Set contributerUser
     *
     * @param \Blogger\BlogBundle\Entity\Users $contributerUser
     *
     * @return Contributers
     */
    public function setContributerUser(\Blogger\BlogBundle\Entity\Users $contributerUser = null)
    {
        $this->contributerUser = $contributerUser;

        return $this;
    }

    /**
     * Get contributerUser
     *
     * @return \Blogger\BlogBundle\Entity\Users
     */
    public function getContributerUser()
    {
        return $this->contributerUser;
    }
}
