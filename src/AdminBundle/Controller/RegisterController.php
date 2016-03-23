<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AdminBundle\Entity\Administrator;


class RegisterController extends Controller
{
    /**
     * @Route("/admin/create", name="admin-register")
     */
    public function createAction(Request $request)
    {
        $administrator = new Administrator();
        $administrator->setUsername('matt');
        $administrator->setPassword(password_hash('siegheil88', PASSWORD_DEFAULT));
        $administrator->setName('Matthew Fitzgerald');

        $em = $this->getDoctrine()->getManager();

        $em->persist($administrator);
        $em->flush();

        return new Response('New administrator with id: '.$administrator->getId());
    }
}