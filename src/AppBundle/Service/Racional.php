<?php
/**
 * Created by PhpStorm.
 * User: ivanm
 * Date: 28/10/2016
 * Time: 17:27
 */

namespace AppBundle\Service;


class Racional
{
    /**
     * @var int
     */
    private $num;
    /**
     * @var int
     */
    private $den;



    public function __construct($num = null, $den = null)
    {
        $this->setNum($num);
        $this->setDen($den);


    }

    public function setNum($num){

        $this->num =  (int) $num;
        return $this;
    }

    public function setDen($den){
        $this->den = (int) $den;
        return  $this;
    }


    public function getNum(){
        return $this->num;
    }

    public function getDen(){
        return $this->den;
    }

    public function __toString()
    {
        return "Racional { Numerador: " . $this->getNum() . ", Denominador: " . $this->getDen() .  "}";
    }

    public function suma(Racional $racional)
   {

       $numerador = $this->getNum() + $racional->getNum();
       $denominador = $this->getDen()* $racional->getDen();
       $resultado = new Racional($numerador, $denominador);
        return $resultado;
   }
    public function resta(Racional $racional)
    {

        $numerador = $this->getNum() - $racional->getNum();
        $denominador = $this->getDen()* $racional->getDen();
        $resultado = new Racional($numerador, $denominador);
        return $resultado;
    }

    public function multiplicacion(Racional $racional)
    {
        $numerador = $this->getNum() * $racional->getNum();
        $denominador = $this->getDen()* $racional->getDen();
        $resultado = new Racional($numerador, $denominador);
        return $resultado;
    }

    public function division(Racional $racional)
    {
        $numerador = $this->getNum() * $racional->getDen();
        $denominador = $this->getDen()* $racional->getNum();
        $resultado = new Racional($numerador, $denominador);
        return $resultado;
    }

}