<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Post;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $postRepository = $this->getDoctrine()
            ->getRepository('BlogBundle:Post');

        $posts = $postRepository->findAll();

        $templateData = array(
            'posts' => $posts
            );
        return $this->render('default/index.html.twig', $templateData);
    }
}