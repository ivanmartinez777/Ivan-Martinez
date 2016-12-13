<?php
/**
 * Created by PhpStorm.
 * User: ivanmartinez777
 * Date: 22/11/16
 * Time: 20:32
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UsuarioController extends Controller
{

    /**
     * @Route("/", name="app_usuario_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();
        $repo = $m->getRepository('Usuario');

        $usuarios = $repo->findAll();
        return $this->render(':usuario:index.html.twig',
            [
                'usuarios' => $usuarios,
            ]
        );
    }


    /**
     * @Route("/create", name="app_usuario_create")
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {
        return $this->render( ':usuario:create.html.twig',
            [
                "action" => 'app_usuario_doCreate'
            ]
        );
    }

    /**
     * @Route("/doCreate", name="app_usuario_doCreate")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doCreateAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $email = $request->request->get('email');

        $user1 = new Usuario();

        $user1
            ->setUsername($username)
            ->setPassword($password)
            ->setEmail($email)
        ;
        $m->persist($user1);
        $m->flush();


        return $this->redirectToRoute('app_usuario_index');

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