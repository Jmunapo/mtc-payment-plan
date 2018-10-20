<?php
function checkmDate($date , $amount){
    $nowDate = new DateTime("today");
     $date1    =new DateTime($date);
     $difference=$nowDate->diff($date1);
    if($date1 < $nowDate && $amount !=0){
        return '<i class="fa fa-close"><i>';
      
    }
    else if($date1 <  $nowDate && $amount ==0){
        return '<i class="fa fa-check"><i>' ;
    }
    else if($date1 >  $nowDate && $amount ==0){
        return '<i class="fa fa-check-square-o"></i>' ; 
    }  
    else{
        return '<i class="fa fa-plus"></i>' ; 
    }   
}
function checkmDays($date , $amount ){
    $nowDate = new DateTime("today");
     $date1    =new DateTime($date);
     $difference=$nowDate->diff($date1);
    if($date1 < $nowDate && $amount !=0){
        return "Expected". $difference->format(' %a days ago');
      
    }
    else if($date1 <  $nowDate && $amount ==0){
        return $difference->format(' Paid %a days ago');
    }
    else if($date1 >  $nowDate && $amount ==0){
        return $difference->format(' %a days Pre-payment'); 
    }  
    else{
        return $difference->format('Due in %a days');
    }   
}