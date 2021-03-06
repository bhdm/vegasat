<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\PageType;
use AppBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    /**
     * @return Response
     * @Route("/page/list", name="admin_page_list")
     * @Template()
     */
    public function listAction()
    {
        $pages = $this->getDoctrine()->getRepository('AppBundle:Page')->findBy([], ['title' =>'ASC']);

        return ['pages' => $pages];
    }

    /**
     * @return Response
     * @Route("/page/add", name="admin_page_add")
     * @Template("@Admin/Page/add.html.twig")
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $item = new Page();
        $form = $this->createForm(PageType::class, $item, array(
            'method' => 'POST',
            'action' => $this->generateUrl('admin_page_add'),
        ));
        $formData = $form->handleRequest($request);

        if ($request->getMethod() === 'POST'){
            if ($formData->isValid()){
                $item = $formData->getData();
                $em->persist($item);
                $em->flush();
                $em->refresh($item);
                return $this->redirect($request->headers->get('referer'));
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * @return Response
     * @Route("/page/{id}/edit", name="admin_page_edit")
     * @Template("@Admin/Page/add.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $this->getDoctrine()->getRepository('AppBundle:Page')->find($id);
        $form = $this->createForm(PageType::class, $item, array(
            'method' => 'POST',
        ));
        $formData = $form->handleRequest($request);

        if ($request->getMethod() === 'POST'){
            if ($formData->isValid()){
                $item = $formData->getData();
                $em->persist($item);
                $em->flush();
                $em->refresh($item);
                return $this->redirect($request->headers->get('referer'));
            }
        }
        return array('form' => $form->createView());
    }
}
