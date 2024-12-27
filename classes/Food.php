<?php
Class Food{
    public $bread;
    public $drink;
    public $bread_qty;
    public $drink_qty;
    private $bread_price;
    private $drink_price;

    function getBreadPrice(){
        if($this->bread==1){
            $this->bread_price = 20;
        }
        elseif($this->bread==2){
            $this->bread_price = 300;
        }
        elseif($this->bread==3){
            $this->bread_price = 1500;
        }
        else{
            $this->bread_price = 0;
        }
        return $this->bread_price;
    }

    function getDrinkPrice(){
        if($this->drink==1){
            $this->drink_price = 35;
        }
        elseif($this->drink==2){
            $this->drink_price = 200;
        }
        elseif($this->drink==3){
            $this->drink_price = 30;
        }
        else{
            $this->drink_price = 0;
        }
        return $this->drink_price;
    }

    function calculateBreadAmount(){
        $bread_amount = $this->bread_qty * $this->bread_price;
        return $bread_amount;
    }

    function calculateDrinkAmount(){
        $drink_amount = $this->drink_qty * $this->drink_price;
        return $drink_amount;
    }

    function calculateTotal(){
        $total = $this->calculateBreadAmount() + $this->calculateDrinkAmount();
        return $total;
    }
}
?>