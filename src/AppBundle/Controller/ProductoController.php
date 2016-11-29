<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductoController extends Controller
{
   /**
    * @Route("/", name="app_producto_index")
    * @return \Symfony\Component\HttpFoundation\Response
    */
    public function indexAction()
    {
    $m = $this->getDoctrine()->getManager();
        $repo = $m->getRepository('AppBundle:Product');
       $products = $repo->findAll();
        $p = $repo->find(13);


        $m->flush();
        return $this->render(':producto:index.html.twig',
        [
            'productos' => $products,
        ]
        );
    }
}
