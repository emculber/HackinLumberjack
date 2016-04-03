<?php

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Blog controller.
 */
class AdminController extends Controller
{
    public function createblogupdateAction(Request $request)
    {
        $text = $request->request->get('text');

        $html = $this->container->get('markdown.parser')->transformMarkdown($text);

        //prepare the response, e.g.
        $response = array("text"=>$html ,"code" => 100, "success" => true);
        //you can return result as JSON
        return new Response(json_encode($response));
    }

    public function saveblogAction(Request $request)
    {
        $title = $request->request->get('title');
        $raw_blog = $request->request->get('text');
        $parsed_blog = $this->container->get('markdown.parser')->transformMarkdown($raw_blog);
        $publish = $request->request->get('publish');

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


        $response = array("success" => true);
        return new Response(json_encode($response));
    }
}