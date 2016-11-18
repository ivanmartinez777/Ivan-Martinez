<?php

namespace AppBundle\Controller;

use AppBundle\Service\Racional;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class RacionalController extends Controller
{
    /**
     * @Route("/", name="app_racional_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(':racional:index.html.twig');
    }


    /**
     * @Route("/sum", name="app_racional_sum")
     * @return \Symfony\Component\HttpFoundation\Response
     */
   public function sumAction()
   {
      return $this->render( ':racional:form.html.twig',
           [
               "action" => 'app_racional_doSum'
           ]
       );
   }

    /**
     * @Route("/doSum", name="app_racional_doSum")
     * @return \Symfony\Component\HttpFoundation\Response
     */
   public function doSumAction(Request $request)
   {
       $op1Num = $request->request->get('Op1Num');
       $op1Den = $request->request->get('Op1Den');
       $op2Num = $request->request->get('Op2Num');
       $op2Den = $request->request->get('Op2Den');

       $rac1 = new Racional($op1Num, $op1Den);
       $rac2 = New Racional($op2Num, $op2Den);

       $result = $rac1->suma($rac2);

       return $this->render( ':racional:result.html.twig',
           [
               'result'=>$result

           ]
       );
   }

    /**
     * @Route("/resta", name="app_racional_resta")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function restaAction()
    {
        return $this->render( ':racional:form.html.twig',
            [
                "action" => 'app_racional_doResta'
            ]
        );
    }
    /**
     * @Route("/doResta", name="app_racional_doResta")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doRestaAction(Request $request)
    {
        $op1Num = $request->request->get('Op1Num');
        $op1Den = $request->request->get('Op1Den');
        $op2Num = $request->request->get('Op2Num');
        $op2Den = $request->request->get('Op2Den');

        $rac1 = new Racional($op1Num, $op1Den);
        $rac2 = New Racional($op2Num, $op2Den);

        $result = $rac1->resta($rac2);

        return $this->render( ':racional:result.html.twig',
            [
                'result'=>$result

            ]
        );
    }
    /**
     * @Route("/multiplicacion", name="app_racional_multiplicacion")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function multiplicacionAction()
    {
        return $this->render( ':racional:form.html.twig',
            [
                "action" => 'app_racional_doMultiplicacion'
            ]
        );
    }
    /**
     * @Route("/doMuliplicacion", name="app_racional_doMultiplicacion")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doMultiplicacionAction(Request $request)
    {
        $op1Num = $request->request->get('Op1Num');
        $op1Den = $request->request->get('Op1Den');
        $op2Num = $request->request->get('Op2Num');
        $op2Den = $request->request->get('Op2Den');

        $rac1 = new Racional($op1Num, $op1Den);
        $rac2 = New Racional($op2Num, $op2Den);

        $result = $rac1->multiplicacion($rac2);

        return $this->render( ':racional:result.html.twig',
            [
                'result'=>$result

            ]
        );
    }

    /**
     * @Route("/division", name="app_racional_division")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function divisionAction()
    {
        return $this->render( ':racional:form.html.twig',
            [
                "action" => 'app_racional_doDivision'
            ]
        );
    }
    /**
     * @Route("/doDivision", name="app_racional_doDivision")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doDivisionAction(Request $request)
    {
        $op1Num = $request->request->get('Op1Num');
        $op1Den = $request->request->get('Op1Den');
        $op2Num = $request->request->get('Op2Num');
        $op2Den = $request->request->get('Op2Den');

        $rac1 = new Racional($op1Num, $op1Den);
        $rac2 = New Racional($op2Num, $op2Den);

        $result = $rac1->division($rac2);

        return $this->render( ':racional:result.html.twig',
            [
                'result'=>$result

            ]
        );
    }


}
