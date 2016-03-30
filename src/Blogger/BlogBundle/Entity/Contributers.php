<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contributers
 *
 * @ORM\Table(name="contributers", indexes={@ORM\Index(name="IDX_7F45E7B4DAE07E97", columns={"blog_id"})})
 * @ORM\Entity
 */
class Contributers
{
    /**
     * @var string
     *
     * @ORM\Column(name="contributer", type="string", length=100, nullable=true)
     */
    private $contributer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=true)
     */
    private $time;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contributers_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Blogger\BlogBundle\Entity\Blog
     *
     * @ORM\ManyToOne(targetEntity="Blogger\BlogBundle\Entity\Blog", inversedBy="contributers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="blog_id", referencedColumnName="id")
     * })
     */
    private $blog;



    /**
     * Set contributer
     *
     * @param string $contributer
     *
     * @return Contributers
     */
    public function setContributer($contributer)
    {
        $this->contributer = $contributer;

        return $this;
    }

    /**
     * Get contributer
     *
     * @return string
     */
    public function getContributer()
    {
        return $this->contributer;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Contributers
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
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
}
