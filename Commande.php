<?php
 class Commande{
    public $id;
    public $ref;
    public $total;
    public $totalPaye;
    public $etat ; 
   
     public function __construct($id,$ref,$total,$totalPaye,$etat)
     {
         $this->id=$id;
         $this->ref=$ref;
         $this->total=$total;
         $this->totalPaye = $totalPaye;
         $this->etat=$etat;
     } 
     //getters 
     public function getEtat(){
        return $this->etat;
     }
      public function getId(){
         return $this->id;
      }
      public function getRef(){
         return $this->ref;
      }
      public function getTotal(){
         return $this->total;
      }
      public function getTotalPaye(){
        return $this->totalPaye;
      }
     
      //setters  
      public function setEtat($etat){
          $this->etat = $etat;
      }
      public function setId($id){
          $this->id=$id;
      }
      public function setRef($ref){
          $this->ref=$ref;
      }
      public function setTotal($total){
          $this->total=$total;
      }
      public function setTotalPaye($totalPaye){
        $this->totalPaye = $totalPaye;
      }
     
     
 }


?>
