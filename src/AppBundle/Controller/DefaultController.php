<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="app_default_index")
     */
    public function indexAction()
    {
        return $this->render(':default:index.html.twig');
        //normalmente, los response y los request son de HttpFoundation
    }




}