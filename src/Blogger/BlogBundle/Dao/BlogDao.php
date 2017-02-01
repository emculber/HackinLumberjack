<?php

namespace Blogger\BlogBundle\Dao;

use Doctrine\ORM\EntityManager;

class BlogDao
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getBlogs($published=false, $limit=null)
    {
        $blogs = $this->em->getRepository('BloggerBlogBundle:Blog')
            ->createQueryBuilder('b')
            ->select('b');

        if ($published) {
            $blogs->where('b.published = TRUE');
        }

        $blogs->addOrderBy('b.created', 'DESC');

        if (false === is_null($limit)) {
            $blogs->setMaxResults($limit);
        }

        return $blogs->getQuery()
            ->getResult();
    }
}