<?php

namespace Blogger\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/", name="profile_page")
     */
    public function indexAction()
    {
        return $this->render('BloggerUserBundle:Profile:index.html.twig');
    }
}
