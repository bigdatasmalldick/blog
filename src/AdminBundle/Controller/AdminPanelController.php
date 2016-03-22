<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminPanelController extends Controller
{
    /**
     * @Route("/admin", name="admin-panel")
     */
    public function indexAction(Request $request)
    {
        return $this->render('admin/base.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/admin/login", name="admin-login")
     */
    public function loginAction(Request $request)
    {
        return $this->render('admin/default/login.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}