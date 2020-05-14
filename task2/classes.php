<?php

abstract class Employee
{
    //private $department; //для справки, не участвует в программе
    //public $profession;
    //private $rang = 1;
    //private $chief = 0;

    public $basicSalary;
    public $coffee;
    public $pages;

    const K_RANG = [1 => 1, 2 => 1.25, 3 => 1.5];
    const K_CHIEF = [0 => 1, 1 => 1.5];

    public function __construct($department, $rang = 1, $chief = 0)
    {
        $this->department = $department;
        //$this->profession = $profession;
        $this->rang = $rang;
        $this->chief = $chief;
    }

    public function getSalary()
    {
        return $this->basicSalary * self::K_CHIEF[$this->chief] * self::K_RANG[$this->rang];
    }

    public function getCoffee()
    {
        if ($this->chief == 1)
            return ($this->coffee * 2);
        else
            return ($this->coffee);
    }

    public function getPages()
    {
        if ($this->chief == 1)
            return 0;
        else
            return ($this->pages);
    }

  }

class Manager extends Employee
{
    public $basicSalary = 500;
    public $coffee = 20;
    public $pages = 200;

}

class Marketolog extends Employee
{
    public $basicSalary = 400;
    public $coffee = 15;
    public $pages = 150;

}

class Engineer extends Employee
{
    public $basicSalary = 200;
    public $coffee = 5;
    public $pages = 50;
}

class Analytic extends Employee
{
    public $basicSalary = 800;
    public $coffee = 50;
    public $pages = 5;
}

class Departament
{
    public $depName;
    public $employers = [];

    public function __construct($depName)
    {
        $this->depName = $depName;
    }

    public function addEmployer($employer)
    {
        $this->employers[] = $employer;
    }

    public function getWorkers()
    {
        return count($this->employers);
    }

    public function getFullSalary()
    {
        $sum = 0;
        foreach ($this->employers as $localEmployer) {
            $sum += $localEmployer->getSalary();
        }
        return $sum;
    }

    public function getFullCoffee()
    {
        $sum = 0;
        foreach ($this->employers as $localEmployer) {
            $sum += $localEmployer->getCoffee();
        }
        return $sum;
    }

    public function getFullPages()
    {
        $sum = 0;
        foreach ($this->employers as $localEmployer) {
            $sum += $localEmployer->getPages();
        }
        return $sum;
    }

    public function getAvgCost()
    {
        $avgCost = $this->getFullSalary() / $this->getFullPages();
        return $avgCost;
    }
}