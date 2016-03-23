<?php

namespace AdminBundle\Controller;

use AppBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @Route("upload-file/{type}", name="upload_file", options={"expose" = true})
     */
    public function indexAction(Request $request, $type)
    {
        $file = $request->files->get('file');
        $title = $file->getClientOriginalName();

        $name = time().$file->guessExtension();
        $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/'.$type;
        $path  = '/uploads/'.$type.'/'.$name;
        $file->move($brochuresDir,$name);
        $image = new Image();
        $image->setTitle($title);
        $image->setPath($path);
        $this->getDoctrine()->getManager()->persist($image);
        $this->getDoctrine()->getManager()->flush($image);
        return new JsonResponse(['path' => $path]);
    }

}
