<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


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
        return $this->render(':producto:index.html.twig',
        [
            'productos' => $products,
        ]
        );
    }


    /**
     * @Route("/create", name="app_producto_create")
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {
        return $this->render( ':producto:create.html.twig',
            [
                "action" => 'app_producto_doCreate'
            ]
        );
    }

    /**
     * @Route("/doCreate", name="app_producto_doCreate")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doCreateAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $name = $request->request->get('name');
        $description = $request->request->get('description');
        $price = $request->request->get('price');

        $prod = new Product();

        $prod
            ->setName($name)
            ->setDescription($description)
            ->setPrice($price)
            ;
       $m->persist($prod);
        $m->flush();


        return $this->redirectToRoute('app_producto_index');

    }

}
