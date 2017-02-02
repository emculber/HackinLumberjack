<?php

namespace Blogger\AdminBundle\Controller;

use Blogger\BlogBundle\Repositories\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    /**
     * @Route("/", name="BloggerAdminBundle_admin")
     */
    public function indexAction()
    {
        $blog = $this->getDoctrine()
        ->getEntityManager()->getRepository('BloggerBlogBundle:Blog')->getBlogs();

        return $this->render('BloggerAdminBundle:Admin:index.html.twig', array(
            'blogs' => $blog
        ));
    }

    /**
     * @Route("/createblog/{id}", name="BloggerAdminBundle_create_blog")
     */
    public function createblogAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        return $this->render('BloggerAdminBundle:Blog:createBlog.html.twig', array(
            'blog' => $blog
        ));
    }
}
