<?php

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Dao\BlogDao;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Enquiry;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getEntityManager();

        $blogDao = new BlogDao($em);

        return $this->render('BloggerBlogBundle:Page:index.html.twig', array(
            'blogs' => $blogDao->getBlogs(true)
        ));
    }

    public function aboutAction()
    {
        return $this->render('BloggerBlogBundle:Page:about.html.twig');
    }

    public function contactAction()
    {
        return $this->render('BloggerBlogBundle:Page:contact.html.twig');
    }
}