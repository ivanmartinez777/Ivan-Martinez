<?php
/**
 * Created by PhpStorm.
 * User: ivanmartinez777
 * Date: 22/11/16
 * Time: 20:32
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuarioController extends Controller
{

    /**
     * @Route("/", name="app_usuario_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();

        $user1 = new Usuario();
        $user1
            ->setEmail('babkabk@hasdfa')
            ->setPassword('blablabla')
            ->setUsername('1')
            ;

        $m->persist($user1);

        $user2 = new Usuario;
        $user2->setEmail('fasdfasdfdf@hotmail.com');
        $user2->setPassword('asdfasdf ');
        $user2->setUsername('2');
        $m->persist($user2);

        $user3= new Usuario();
        $user3->setEmail('sdfasdfasdf@hotmail.com');
        $user3->setPassword('dfasfasdf');
        $user3->setUsername('3');
        $m->persist($user3);

        $m->flush();




    }
}