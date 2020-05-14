<?php
include_once(__DIR__ . '/classes.php');
$departaments = [];
$departaments['zakupki'] = $zakupki = new Departament('zakupki');
$departaments['management'] = $management = new Departament('management');
$departaments['advertising'] = $advertising = new Departament('advertising');
$departaments['logistic'] = $logistic = new Departament('logistic');

//наполняем отдел закупок работниками
for ($i = 0; $i < 9; $i++) {
    $zakupki->addEmployer(new Manager('zakupki',  ));
}

for ($i = 0; $i < 3; $i++) {
    $zakupki->addEmployer(new Manager('zakupki', 2));
}

for ($i = 0; $i < 2; $i++) {
    $zakupki->addEmployer(new Marketolog('zakupki', 3));
}

$zakupki->addEmployer(new Manager('zakupki', 2, 1));

//наполняем отдел прдаж
for ($i = 0; $i < 12; $i++) {
    $management->addEmployer(new Manager('management'));
}

for ($i = 0; $i < 6; $i++) {
    $management->addEmployer(new Marketolog('management'));
}

for ($i = 0; $i < 3; $i++) {
    $management->addEmployer(new Analytic('management'));
}

for ($i = 0; $i < 2; $i++) {
    $management->addEmployer(new Analytic('management', 2));
}

$management->addEmployer(new Marketolog('management', 2, 1));

//наполняем отдел рекламы
for ($i = 0; $i < 15; $i++) {
    $advertising->addEmployer(new Marketolog('advertising'));
}

for ($i = 0; $i < 10; $i++) {
    $advertising->addEmployer(new Marketolog('advertising', 2));
}

for ($i = 0; $i < 8; $i++) {
    $advertising->addEmployer(new Manager('advertising'));
}

for ($i = 0; $i < 2; $i++) {
    $advertising->addEmployer(new Engineer('advertising'));
}

$advertising->addEmployer(new Marketolog('advertising', 3, 1));

//наполняем отдел логистики
for ($i = 0; $i < 13; $i++) {
    $logistic->addEmployer(new Manager('logistic'));
}

for ($i = 0; $i < 5; $i++) {
    $logistic->addEmployer(new Manager('logistic', 2));
}

for ($i = 0; $i < 5; $i++) {
    $logistic->addEmployer(new Engineer('logistic'));
}

$logistic->addEmployer(new Manager('logistic', 1, 1));
//счетчики для общих значений чтоб учесть в цикле
$countDepartaments = 0;
$countWorkers = 0;
$countSalary = 0;
$countCoffee = 0;
$countPages = 0;

foreach ($departaments as $name => $departament) {
    echo "<hr/>";
    echo 'в отделе ' . $name . ": <br />";
    echo 'работников: ' . $departament->getWorkers() . "<br />";
    echo 'нужно зарплаты: ' . $departament->getFullSalary() . "<br />";
    echo 'выпивают кофе: ' . $departament->getFullCoffee() . "<br />";
    echo 'тратят листов: ' . $departament->getFullPages() . "<br />";
    echo 'средняя трата на лист: ' . $departament->getAvgCost() . "<br />";

    $countDepartaments += 1;
    $countWorkers += $departament->getWorkers();
    $countSalary += $departament->getFullSalary();
    $countCoffee += $departament->getFullCoffee();
    $countPages += $departament->getFullPages();
}
echo "<hr/>";
echo 'всего сотрудников: ' . $countWorkers . "<br />";
echo 'всего зарплаты: ' . $countSalary . "<br />";
echo 'всего кофе: ' . $countCoffee . "<br />";
echo 'всего листов: ' . $countPages . "<br />";

echo "<hr/>";
echo 'среднее сотрудников: ' . $countWorkers / $countDepartaments . "<br />";
echo 'среднее зарплаты: ' . $countSalary / $countDepartaments . "<br />";
echo 'среднее кофе: ' . $countCoffee / $countDepartaments . "<br />";
echo 'среднее листов: ' . $countPages / $countDepartaments . "<br />";
echo "<hr/>";
echo 'общая средняя трата на лист: ' . round($countSalary/$countPages, 3) ;
