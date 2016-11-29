<?php

namespace AppBundle\Controller;

use AppBundle\Service\Calculadora;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CalculatorController extends Controller
{
    /**
     * @Route("/", name="app_calculator_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(':calculator:index.html.twig');
    }


    /**
     * @Route("/sum", name="app_calculator_sum")
     * @return \Symfony\Component\HttpFoundation\Response
     */
   public function sumAction()
   {
      return $this->render( ':calculator:form.html.twig',
           [
               "action" => 'app_calculator_doSum'
           ]
       );
   }

    /**
     * @Route("/doSum", name="app_calculator_doSum")
     * @return \Symfony\Component\HttpFoundation\Response
     */
   public function doSumAction(Request $request)
   {
       $op1 = $request->request->get('Op1');
       $op2 = $request->request->get('Op2');


       $calcu = new Calculadora($op1,$op2);
       $calcu->suma();
       $result = $calcu->getResultado();

       return $this->render( ':calculator:result.html.twig',
           [
               'result'=>$result,
               'op1'=>$op1,
               'op2'=>$op2,
               'operador'=>'suma'
                //esto es un array asociativo
           ]
       );
   }

    /**
     * @Route("/resta", name="app_calculator_resta")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function restaAction()
    {
        return $this->render( ':calculator:form.html.twig',
            [
                "action" => 'app_calculator_doResta'
            ]
        );
    }
    /**
     * @Route("/doResta", name="app_calculator_doResta")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doRestaAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $op1 = $request->request->get('Op1');
        $op2 = $request->request->get('Op2');

        $calcu = new Calculadora($op1,$op2);
        $calcu->resta();
        $result = $calcu->getResultado();

        return $this->render( ':calculator:result.html.twig',
            [
                'result'=>$result,
                'op1'=>$op1,
                'op2'=>$op2,
                'operador'=>'resta'

            ]
        );
    }
    /**
     * @Route("/multiplicacion", name="app_calculator_multiplicacion")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function multiplicacionAction()
    {
        return $this->render( ':calculator:form.html.twig',
            [
                "action" => 'app_calculator_doMultiplicacion'
            ]
        );
    }
    /**
     * @Route("/doMuliplicacion", name="app_calculator_doMultiplicacion")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doMultiplicacionAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $op1 = $request->request->get('Op1');
        $op2 = $request->request->get('Op2');

        $calcu = new Calculadora($op1,$op2);
        $calcu->multiplicacion();
        $result = $calcu->getResultado();

        return $this->render( ':calculator:result.html.twig',
            [
                'result'=>$result,
                'op1'=>$op1,
                'op2'=>$op2,
                'operador'=>'multiplicacion'

            ]
        );
    }

    /**
     * @Route("/division", name="app_calculator_division")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function divisionAction()
    {
        return $this->render( ':calculator:form.html.twig',
            [
                "action" => 'app_calculator_doDivision'
            ]
        );
    }
    /**
     * @Route("/doDivision", name="app_calculator_doDivision")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doDivisionAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $op1 = $request->request->get("Op1");
        $op2 = $request->request->get("Op2");

        $calcu = new Calculadora($op1,$op2);
        $calcu->division();
        $result = $calcu->getResultado();

        return $this->render( ':calculator:result.html.twig',
            [
                'result'=>$result,
                'op1'=>$op1,
                'op2'=>$op2,
                'operador'=>'division'

                //variable de asociacion
            ]
        );
    }


}
