<?php

namespace Blogger\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Blogger\BlogBundle\Entity\Blog;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    /**
     * @Route("/update/blog/markdown", name="BloggerAdminBundle_update_blog_markdown")
     */
     public function createblogupdateAction(Request $request)
    {
        $text = $request->request->get('text');

        $html = $this->container->get('markdown.parser')->transformMarkdown($text);

        //prepare the response, e.g.
        $response = array("text"=>$html ,"code" => 100, "success" => true);
        //you can return result as JSON
        return new Response(json_encode($response));
    }

    /**
     * @Route("/save/blog", name="BloggerAdminBundle_save_blog")
     */
    public function saveblogAction(Request $request)
    {
        $id = $request->request->get('id');
        $title = $request->request->get('title');
        $raw_blog = $request->request->get('text');
        $parsed_blog = $this->container->get('markdown.parser')->transformMarkdown($raw_blog);
        $publish = $request->request->get('publish');

        if($id == 0) {
            $user = $this->get('security.token_storage')->getToken()->getUser();

            $blog = new Blog();
            $blog->setTitle($title);
            $blog->setAuthor($user);
            $blog->setRawBlog($raw_blog);
            $blog->setBlog($parsed_blog);
            $blog->setPublished($publish);

            $em = $this->getDoctrine()->getManager();
            $em->persist($blog);
            $em->flush();
        }else {
            $em = $this->getDoctrine()->getEntityManager();
            $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

            $blog->setTitle($title);
            $blog->setRawBlog($raw_blog);
            $blog->setBlog($parsed_blog);
            $blog->setPublished($publish);
            $em->flush();
        }

        $response = array("success" => true, "id" =>$id = $blog->getId());
        return new Response(json_encode($response));
    }
}