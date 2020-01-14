<?php

class Components extends Controller{
    
public function createCombobox($optionArray,$componentID,$selectedID,$onchange=""){
        $componentPrint='<select class="js-example-basic-single" id="'.$componentID.'" name="'.$componentID.'" '.$onchange.'>';
        $selected='';
        $choseOpt = "Seçiniz";
        if($selectedID==""){
            $componentPrint.='<option value="" selected="selected">'.$choseOpt.'</option>';
        } else {
            $componentPrint.='<option value="">'.$choseOpt.'</option>';
        }
        foreach ($optionArray as $key => $value){
            if ($key==$selectedID){
                $selected='selected="selected"';
            }else{
                $selected='';
            }
            $componentPrint.='<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
        }
        $componentPrint.='</select>';        
        return $componentPrint;
    }
}