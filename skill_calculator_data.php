<?php
    include_once "config/database.php";
    include_once "classes/Developer.php";
    include_once "classes/Calculator.php";
    
    // Database Data
    $database = new Database();
    $db = $database->getConnection();

    $developer = new Developer($db);
    $view_developer = $developer->readDeveloper();

    // Calculator Data
    $developer_id = "";
    $hours_worked = 0;
    $skill_level = "";
    $rate = 0.0;
    $regular_pay = 0.0;
    $overtime_pay = 0.0;
    $total_pay = 0.0;

    if(isset($_POST['compute'])) {
        $developer_id = $_POST['developer_id'];
        if($_POST['hours_worked'] <> ""){
            $hours_worked = $_POST['hours_worked'];
        }
        else{
            $hours_worked = 0.0;
        }
        $skill_level = $_POST['skill_level'];

        //instantiate
        $salary = new Calculator();
        $salary->skill_level = $skill_level;
        $rate = $salary->getRate();

        $salary->hours_worked = $hours_worked;
        $regular_pay = $salary->CalculateRegularPay();

        $overtime_pay = $salary->CalculateOvertimePay();

        $total_pay = $salary->CalculateTotalPay();
    }
?>