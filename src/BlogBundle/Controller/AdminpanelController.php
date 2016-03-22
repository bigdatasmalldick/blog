<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminpanelController extends Controller
{
    /**
     * @Route("/admin", name="adminpage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('admin/base.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/admin/login", name="adminlogin")
     */
    public function loginAction(Request $request)
    {
        return $this->render('admin/default/login.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}