<?php
/**
 * Created by PhpStorm.
 * User: ea.kichaev
 * Date: 18.11.2020
 * Time: 10:56
 */

class Complex
{
    private $real;
    private $imag;

    public function __construct(float $real = 0, float $imag = 0)
    {
        $this->real = $real;
        $this->imag = $imag;
    }

    public function Add(Complex $complex)
    {
        return new Complex($this->real + $complex->real, $this->imag + $complex->imag);
    }

    public function Sub(Complex $complex)
    {
        return new Complex($this->real - $complex->real, $this->imag - $complex->imag);
    }

    public function Mult(Complex $complex)
    {
        $real = $this->real * $complex->real - $this->imag * $complex->imag;
        $imag = $this->imag * $complex->real + $this->real * $complex->imag;
        return new Complex($real, $imag);
    }

    public function Div(Complex $complex)
    {
        if(!$complex->real && !$complex->imag)
            return false;
        $real = ($this->real * $complex->real + $this->imag * $complex->imag) / (pow($complex->real, 2) + pow($complex->imag, 2));
        $imag = ($this->imag * $complex->real - $this->real * $complex->imag) / (pow($complex->real, 2) + pow($complex->imag, 2));
        return new Complex($real, $imag);
    }

    public function Sqr()
    {
        return $this->Mult($this);
    }

    public function __toString()
    {
        $real = $this->real != 0 || !$this->imag ? $this->real : "";
        $imag = $this->imag ? $this->imag."i" : "";
        $sign = $this->imag > 0 && $real ? "+" : "";
        return "{$real}{$sign}{$imag}";
    }
}


//$com1 = new Complex(1, 2);
//$com2 = new Complex(3, -4);
//echo $com1 . "<br>" . $com2 . "<br>";
//echo $com1->Add($com2) . "<br>";
//echo $com1->Sub($com2) . "<br>";
//echo $com1->Mult($com2) . "<br>";
//echo $com1->Div($com2) . "<br>";
//echo $com1->Sqr() . "<br>";
//
//$com3 = clone $com1;
//echo $com3 . "<br>";
//var_dump($com1 == $com3);
//var_dump($com1 === $com3);
//var_dump($com1 == $com1);
//var_dump($com1 === $com1);
