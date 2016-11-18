<?php
/**
 * Created by PhpStorm.
 * User: ivanm
 * Date: 28/10/2016
 * Time: 17:27
 */

namespace AppBundle\Service;


class Calculadora
{
    /**
     * @var int
     */
    private $op1;
    /**
     * @var int
     */
    private $op2;
    /**
     * @var int
     */
    private $resultado;

    public function __construct($op1 = null, $op2 = null, $resultado = null)
    {
        $this->setOp1($op1);
        $this->setOp2($op2);
        $this->setResultado($resultado);

    }

    public function setOp1($op1){

        $this->op1 =  (int) $op1;
        return $this;
    }

    public function setOp2($op2){
        $this->op2 = (int) $op2;
        return  $this;
    }

    public function setResultado($resultado){
        $this->resultado = $resultado;
        return  $this;
    }

    public function getResultado(){
        return $this->resultado;
    }

    public function getOp1(){
        return $this->op1;
    }

    public function getOp2(){
        return $this->op2;
    }

    public function suma(){

        $this->setResultado($this->getOp1()+$this->getOp2());

        return $this->getResultado();
    }



    public function resta(){

        $this->setResultado($this->getOp1()- $this->getOp2());
        return $this->getResultado();
    }

    public function multiplicacion(){
        $this->setResultado($this->getOp1()* $this->getOp2());
        return $this->getResultado();
    }
    public function division(){

        if ($this->getOp2() != 0 ){
            $this->setResultado($this->getOp1() / $this->getOp2());
            return $this->getResultado();
        } else {
             $this->setResultado('No se puede dividir entre 0');
            return $this->getResultado();
        }
    }




}