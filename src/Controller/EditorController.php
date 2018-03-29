<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/editor")
 */
class EditorController extends AbstractController
{
    /**
     * @Route("/", defaults={"page": "1", "_format"="html"}, name="show_list")
     * @Method("GET")
     */
    public function index(): Response
    {
        return $this->render('editor/list.html.twig');
    }
}
