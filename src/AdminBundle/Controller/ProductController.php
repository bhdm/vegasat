<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\ProductType;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProductController
 * @package AdminBundle\Controller
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * @Route("/list", name="admin_product_list")
     * @Template("")
     */
    public function listAction()
    {
        return [];
    }

    /**
     * @ParamConverter("product", class="AppBundle:Product")
     * @Route("/{product}/edit", name="admin_product_edit")
     * @Template("")
     */
    public function editAction(Product $product){
        return['product' => $product];
    }

    /**
     * @Route("/add", name="admin_product_add")
     * @Template("AdminBundle:Product:item.html.twig")
     */
    public function addAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $product = new Product();
        $form = $this->createForm(ProductType::class,$product);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $product = $form->getData();
            $em->persist($product);
            $em->flush($product);
            return $this->redirectToRoute('admin_product_list');
        }

        return ['form' => $form->createView()];
    }
}
