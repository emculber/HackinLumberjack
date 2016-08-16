<?php

namespace Blogger\MovieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MovieController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $url = 'http://localhost:8080/api/getmovies';
        $data = array('key' => '66IliKuYo5wZNlyXdlsLCWoUBliSWKu8Rms7wbTfmk3yz5Pn3sThrdrx914UivQF');
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            )
        );

        $context  = stream_context_create($options);
        $json = file_get_contents($url, false, $context);
        $movies = json_decode($json, true);

        return $this->render('BloggerMovieBundle:Page:index.html.twig', array(
            'movies' => $movies,
            'users' => array('emculber', 'asgrant')
        ));
    }
}
