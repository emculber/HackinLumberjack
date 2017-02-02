<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Enquiry;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function indexAction()
    {
        $blog = $this->getDoctrine()
            ->getEntityManager()->getRepository('BloggerBlogBundle:Blog')->getBlogs(true);


        return $this->render('BloggerBlogBundle:Page:index.html.twig', array(
            'blogs' => $blog
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