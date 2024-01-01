<?php
class Calculator {
    //create the fields
    public $skill_level;
    public $hours_worked;
    private $rate;

    function getRate(){
        if($this->skill_level==1){
            $this->rate = 300.00;
        }
        elseif($this->skill_level==2){
            $this->rate = 400.00;
        }
        elseif($this->skill_level==3){
            $this->rate = 500.00;
        }
        else{
            $this->rate = 0.00;
        }
        return $this->rate;
    }

    function CalculateRegularPay(){
        if($this->hours_worked <= 8){
            $regular_pay = $this->hours_worked * $this->rate;
        }
        else{
            $regular_pay = 8 * $this->rate;
        }
        return $regular_pay;
    }

    function CalculateOvertimePay(){
        if($this->hours_worked > 8){
            $excessHours = $this->hours_worked - 8;
            $overtime_pay = $this->rate * $excessHours * 1.5;
        }
        else{
            $overtime_pay = "No overtime pay";
        }
        return $overtime_pay;
    }

    function CalculateTotalPay(){
        if($this->hours_worked > 8){
            $total_pay = $this->CalculateRegularPay() + $this->CalculateOvertimePay();
        }
        else{
            $total_pay = $this->CalculateRegularPay();
        }
        return $total_pay;
    }
}
?>