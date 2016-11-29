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
    {   /*$m = $this->getDoctrine()->getManager();
        $p = new Product();
        $p
            ->setName('Meizu MX5')
            ->setDescription('Chino con cierta garantía')
            ->setPrice('300')
            ;
        $m->persist($p); Así se añaden clases*/
    $m = $this->getDoctrine()->getManager();
        $repo = $m->getRepository('AppBundle:Product');
    //    $m->flush();
       /* $p = $repo->findOneBy([
            'name' => 'Meizu MX5',
        ]);*/
       $products = $repo->findAll();
        $p = $repo->find(10);
        $p->setPrice('1100');
        $p->setDescription('Black Frida- Que nos los quitan de las manos');

        $p1 = $repo->findOneByName('Meizu MX5');

        $m->remove($p1);

        $m->flush();
        return $this->render(':producto:index.html.twig',
        [
            'productos' => $products,
        ]
        );
    }
}
