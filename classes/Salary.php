<?php
Class Salary{
    public $hourly_rate;
    public $hours_worked;
    
    function CalculateRegularPay(){
        if($this->hours_worked <= 8){
            $regular_pay = $this->hours_worked * $this->hourly_rate;
        }
        else{
            $regular_pay = 8 * $this->hourly_rate;
        }
        return $regular_pay;
    }

    function CalculateOvertimePay(){
        if($this->hours_worked > 8){
            $excessHours = $this->hours_worked - 8;
            $overtime_pay = $this->hourly_rate * $excessHours * 1.5;
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