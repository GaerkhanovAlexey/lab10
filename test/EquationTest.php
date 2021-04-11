<?php

use PHPUnit\Framework\TestCase;
use leha\Exception;
use leha\Equation;

class EquationTest extends TestCase
{
    public function testEquation()
    {
        $equation = new Equation();
        $this->assertEquals([-12], $equation->li_solve(6, 72));
        $this->assertEquals([1], $equation->li_solve(-1, 1));
    }

    public function testEquationBad()
    {
        $equation = new Equation();
        $this->expectExceptionMessage('Ошибка: уравнения не существует.');
        $this->expectException(Exception::class);
        $equation->li_solve(0, -7);
        $equation->li_solve(0, 2);
    }
}
