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

    /**
     * @Route("/update/{id}", name="app_producto_update")
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function updateAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Product');
       $product = $repository->find($id);
        return $this->render( ':producto:update.html.twig',
            [
                'productos'  => $product,
            ]
        );
    }

    /**
     * @Route("/doUpdate", name="app_producto_doUpdate")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doUpdateAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Product');

        $id         = $request->request->get('id');
        $name = $request->request->get('name');
        $description = $request->request->get('description');
        $price = $request->request->get('price');

        $prod = $repository->find($id);

        $prod
            ->setName($name)
            ->setDescription($description)
            ->setPrice($price)
            ->setUpdatedAt()
        ;

        $m->flush();


        return $this->redirectToRoute('app_producto_index');

    }


    /**
     * @Route("/remove/{id}", name="app_producto_remove")
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function removeAction( $id)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Product');


        $product = $repository->find($id);
        $m->remove($product);
        $m->flush();

        return $this->redirectToRoute('app_producto_index');
    }

}
