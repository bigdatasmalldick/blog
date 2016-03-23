<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Post;

class PostController extends Controller
{
    /**
     * @Route("/post/{id}", name="post")
     */
    public function postAction(Request $request, $id)
    {
        $post = $this->getDoctrine()
            ->getRepository('BlogBundle:Post')
            ->find($id);

        $templateData = array(
                'post' => $post
            );
        return $this->render('default/post.html.twig', $templateData);
    }

    /**
     * @Route("/creatte", name="createpost")
     */
    public function createAction(Request $request)
    {
        $post = new Post();
        $post->setTitle('See papaa');
        $post->setSubTitle('Estoy aprendiendo symfony!');
        $post->setContent('<h3>Seee papa</h3><p>La verdad que re zarpado me esta quedando el blog loco ehehehe</p><p><b>est</b>oy <i>reeee locooo</i> <u>ujujujujuju</u></p>');
        $post->setAuthor('Ariel Holowinski');
        $date = new \DateTime();
        $post->setDate($date);

        $em = $this->getDoctrine()->getManager();

        $em->persist($post);
        $em->flush();

        return new Response('Created blog post with id ' . $post->getId());
    }
}