<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Enquiry;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getEntityManager();

        $blogs = $em->getRepository('BloggerBlogBundle:Blog')
            ->getPublishedLatestBlogs();

        return $this->render('BloggerBlogBundle:Page:index.html.twig', array(
            'blogs' => $blogs
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