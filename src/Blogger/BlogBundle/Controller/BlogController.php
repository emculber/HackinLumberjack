<?php

namespace Blogger\BlogBundle\Controller;

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


         return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog
        ));
    }

    public function createblogupdateAction(Request $request)
    {
        $text = $request->request->get('text');

        $html = $this->container->get('markdown.parser')->transformMarkdown($text);

        //prepare the response, e.g.
        $response = array("text"=>$html ,"code" => 100, "success" => true);
        //you can return result as JSON
        return new Response(json_encode($response));
    }
}