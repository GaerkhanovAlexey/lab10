<?php


use leha\QuEquation;
use PHPUnit\Framework\TestCase;

class QuEquationTest extends TestCase
{
    public function testQuEquation()
    {
        $QuEquation = new QuEquation();
        $this->assertEquals([-1, 3], $QuEquation->solve(-1, 2, 3));
        $this->assertEquals([-3], $QuEquation->solve(0, 3, 9));
        $this->assertEquals([-3], $QuEquation->solve(1, 6, 9));
    }

    public function testQuEquationBad()
    {
        $QuEquationEx = new QuEquation();
        $this->expectExceptionMessage("Ошибка: уравнение не имеет корней.");
        $this->expectException(Exception::class);
        $QuEquationEx->solve(4, 0, 8);
        $QuEquationEx->solve(4, 2, 1);
    }

}
