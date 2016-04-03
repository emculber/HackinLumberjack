<?php

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        //$isAdmin = $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN');
        if (!$blog->getPublished()) {
            throw $this->createNotFoundException('Blog post is not published.');
        }

        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog' => $blog
        ));
    }
}
