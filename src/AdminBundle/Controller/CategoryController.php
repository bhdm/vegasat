<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\CategoryType;
use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    /**
     * @return Response
     * @Route("/category/list", name="admin_category_list")
     * @Template()
     */
    public function listAction()
    {
        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findBy(['enabled' => true, 'parent' => null]);

        return ['categories' => $categories];
    }

    /**
     * @return Response
     * @Route("/category/add", name="admin_category_add")
     * @Template("@Admin/Category/modal-add.html.twig")
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $item = new Category();
        $form = $this->createForm(CategoryType::class, $item, array(
            'method' => 'POST',
            'action' => $this->generateUrl('admin_category_add'),
        ));
        $formData = $form->handleRequest($request);

        if ($request->getMethod() === 'POST'){
            if ($formData->isValid()){
                $item = $formData->getData();
//                $file = $item->getImage();
//                if ($file){
//                    $filename = time(). '.'.$file->guessExtension();
//                    $file->move(
//                        __DIR__.'/../../../web/upload/course/',
//                        $filename
//                    );
//                    $item->setImage(['path' => '/upload/course/'.$filename ]);
//                }
                $em->persist($item);
                $em->flush();
                $em->refresh($item);
                return $this->redirect($request->headers->get('referer'));
            }
        }
        return array('form' => $form->createView());
    }
}
