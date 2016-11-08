<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/name/{name}", name="app_default_index")
     */
    public function indexAction($name)
    {
        return new Response('Hello ' . $name);
        //normalmente, los response y los request son de HttpFoundation
    }

         /**
         * @Route("prueba1" , name="app_default_pruebaVista")
         */
//si no pongo un name me lo pondría sólo

    public function pruebaVistaAction()
    {
        //un action que no tenga una ruta no sirve de nada
        return $this->render(':default:vista1.html.twig', [
            'titulo' => 'Mi página web',
        'Resultado' => '3',
        ]);
        //la de los dos puntos tiene también en cuenta la ruta
    }

}