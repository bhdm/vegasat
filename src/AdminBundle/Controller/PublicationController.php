<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\PublicationType;
use AppBundle\Entity\Publication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PublicationController extends Controller
{
    /**
     * @return Response
     * @Route("/publication/list", name="admin_publication_list")
     * @Template()
     */
    public function listAction()
    {
        $publications = $this->getDoctrine()->getRepository('AppBundle:Publication')->findBy([], ['title' =>'ASC']);

        return ['publications' => $publications];
    }

    /**
     * @return Response
     * @Route("/publication/add", name="admin_publication_add")
     * @Template("@Admin/Publication/add.html.twig")
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $item = new Publication();
        $form = $this->createForm(PublicationType::class, $item, array(
            'method' => 'POST',
            'action' => $this->generateUrl('admin_publication_add'),
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
     * @Route("/publication/{id}/edit", name="admin_publication_edit")
     * @Template("@Admin/Publication/add.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $this->getDoctrine()->getRepository('AppBundle:Publication')->find($id);
        $form = $this->createForm(PublicationType::class, $item, array(
            'method' => 'POST',
            'action' => $this->generateUrl('admin_publication_edit'),
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
