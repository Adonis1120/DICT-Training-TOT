<?php
    include_once "classes/Food.php";

    $first_name = "";
    $last_name = "";
    $bread = "";
    $bread_qty = 0;
    $drink = "";
    $drink_qty = 0;
    $bread_price = 0;
    $drink_price = 0;
    $bread_amount = 0;
    $drink_amount = 0;
    $total = 0;

    if($_POST){
        $first_name = $_POST['first_name']; //variable = from the name attribute of html elements
        $last_name = $_POST['last_name'];
        switch ($_POST['bread']) {
            case '1':
                $bread = "Pandesal";
                break;
            case '2':
                $bread = "Loaf Bread";
                break;
            case '3':
                $bread = "Cake";
                break;
            default:
                $bread = "";
                break;
        }
        if($_POST['bread_qty'] <> ""){
            $bread_qty = $_POST['bread_qty'];
        }
        else{
            $bread_qty = 0;
        }
        switch ($_POST['drink']) {
            case '1':
                $drink = "Mineral Water";
                break;
            case '2':
                $drink = "Brewed Coffee";
                break;
            case '3':
                $drink = "Soft Drink";
                break;
            default:
                $drink = "";
                break;
        }
        if($_POST['drink_qty'] <> ""){
            $drink_qty= $_POST['drink_qty'];
        }
        else{
            $drink_qty = 0;
        }

        //Instantiate
        $food = new Food();
        $food->bread = $_POST['bread'];
        $bread_price = $food->getBreadPrice();
        $food->drink = $_POST['drink'];
        $drink_price = $food->getDrinkPrice();

        $food->bread_qty = $bread_qty;
        $bread_amount = $food->calculateBreadAmount();
        $food->drink_qty = $drink_qty;
        $drink_amount = $food->calculateDrinkAmount();

        $total = $food->calculateTotal();
    }
?>