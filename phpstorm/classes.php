<?php

/**..**/
class student
{
    public $name;
    public $results;

    function __construct($name, array $results)
    {
        echo '<br /> Студент ' . $name . ':';
        foreach ($results as $subject => $item) {
            echo '<br />' . $subject . ':' . $item;
        }
        echo '<hr>';

    }
}

$student1 = new student('Maxim', array('math'=>3, 'biology'=>4));
$student2 = new student('Evgenii', array('math'=>4, 'biology'=>4));
$student3 = new student('Georg', 1);