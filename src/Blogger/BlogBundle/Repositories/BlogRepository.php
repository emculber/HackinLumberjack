<?php

namespace Blogger\BlogBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class BlogRepository extends EntityRepository
{
    public function getBlogs($published=false, $limit=null)
    {
        $blogs = $this->createQueryBuilder('b')
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