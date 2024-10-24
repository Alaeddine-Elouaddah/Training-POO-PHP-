<?php
require_once "CommandeService.php" ; 
require_once "CommandeDAO.php" ;
require_once "Commande.php" ;
require_once "CommandeWs.php" ;
   $ws = new CommandeWs();
   $response = [];
   $method = $_SERVER["REQUEST_METHOD"];
   if($method=="GET"){
       if(isset($_GET["ref"])){
         $response=$ws->findByRef($_GET["ref"]);
       }
       elseif(isset($_GET["id"])){
       $response=$ws->findById($_GET["id"]);
       }
       else{
        $response = $ws->findAll();
       }
   }
echo $response ; 
?>
