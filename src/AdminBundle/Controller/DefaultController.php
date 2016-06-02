<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="admin_homepage")
     */
    public function indexAction()
    {
//        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
//            return $this->redirectToRoute('admin_auth_login');
//        }else{
            return $this->redirectToRoute('admin_product_list');
//        }
    }

    public function csrfTokenAction(){
        $csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate');
        return $this->render('AdminBundle:Defaults:csrfToken.html.twig', ['csrf_token' => $csrfToken]);
    }


    /**
     * @Template("@Admin/navigation.html.twig")
     */
    public function navigationAction(){
        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findBy(['enabled' => true]);
        return ['categories' => $categories];
    }
}
