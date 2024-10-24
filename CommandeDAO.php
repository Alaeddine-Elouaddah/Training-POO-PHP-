<?php
require_once "Commande.php";
 class CommandeDAO{
   private $dao;
   public function __construct()
   {
      $this->dao = new PDO ("mysql:host=localhost;dbname=commande","root" ,"" );
   }
   
      public function save(Commande $commande ){
       $statement = $this->dao->prepare("INSERT INTO commande(ref,total) VALUES(?,?)");
       $statement->execute([$commande->getRef(),$commande->getTotal()]);
       return 1  ; 
      }
      public function update(Commande $commande ){
          $statement=$this->dao->prepare("UPDATE  SET  ref=? , total = ? , WHERE id = ? ");
          $statement->execute([$commande->getRef(),$commande->getTotal(),$commande->getId()]);
          return 1 ;
      }
      public function findById($id){
       $statement=$this->dao->prepare("SELECT * FROM cmmande WHERE id = ? ");
       $statement->execute([$id]);
       $result=null;
       $rows = $statement->fetch(PDO::FETCH_ASSOC);
       if($rows){
          $result = new Commande($rows["id"],$rows["ref"] ,$rows["total"],$rows["totalPaye"] ,$rows["etat"]);
       }
       return $result ; 
       }
       public function findByRef($ref){
         $result = null ;
        $statement= $this->dao->prepare("SELECT * FROM commande WHERE  ref = ? ");
        $statement->execute([$ref]);
        $row= $statement->fetch(PDO::FETCH_ASSOC);
        if($row){
            $result = new Commande($row["id"] , $row["ref"] , $row["total"],$row["totalPaye"],$row["etat"]);
        }
        return $result ; 
       }
       public function findAll(){
         $statement  =  $this->dao->prepare("SELECT * FROM commande");
         $statement->execute();
         $result = [] ;
         while($row = $statement->fetch(PDO::FETCH_ASSOC)){
         $result [] =  new Commande($row["id"] , $row["ref"] ,$row["total"],$row["totalPaye"],$row["etat"] );
         } 
         return $result ; 
       }
       public function deleteByRef($ref){
       $statement = $this->dao->prepare("DELETE FROM  commande WHERE ref = ? ");
       $statement->execute([$ref]);
       return 1  ; 
       }     
 }

?>
