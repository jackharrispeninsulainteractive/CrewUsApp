<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - NextStats_Dev
 * Last Updated - 16/02/2021
 */

class InterfaceAlert
{
    public function create($Text, $Type = ""){

        $Type = strtolower($Type); // remove upper case letters

        if($Type == "error"){
            $this->error($Text);
        }
        elseif($Type == "success"){
            $this->success($Text);
        }
        elseif($Type == "warning"){
            $this->warning($Text);
        }
        else{
            $this->default($Text);
        }

    }

    private function default($Text){
        echo "<br><div class='alert alert-info' role='alert' style='text-align: center'>
               <strong>$Text</strong></div>";
    }

    private function error($Text){
        echo "<br><div class='alert alert-danger' role='alert' style='text-align: center'>
               <strong>$Text</strong></div>";
    }

    private function success($Text){
        echo "<br><div class='alert alert-success' role='alert' style='text-align: center'>
               <strong>$Text</strong></div>";
    }

    private function warning($Text){
        echo "<br><div class='alert alert-warning' role='alert' style='text-align: center'>
               <strong>$Text</strong></div>";
    }

}