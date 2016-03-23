<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AdminBundle\Entity\Administrator;


class LoginController extends Controller
{
    /**
     * @Route("/admin/login", name="admin-login")
     */
    public function loginAction(Request $request)
    {
    	$administrator = new Administrator();

    	$form = $this->createFormBuilder($administrator)
    		->add('username', TextType::class)
    		->add('password', PasswordType::class)
    		->add('save', SubmitType::class)
    		->getForm();

    	$templateData = array(
    		'form', $form->createView(),
    		);

        return $this->render('admin/default/login.html.twig', $templateData);
    }
}
