<?php
   require_once "Commande.php";
   require_once "CommandeDAO.php" ;
   
      class CommandeService{
         private $dao ; 
         public function __construct(){
            $this->dao = new CommandeDAO();
         }

            public function save(Commande $commande ){
              $loaded  = $this->dao->findByRef($commande->getRef());
              if($loaded!=null){
                return -1 ; 
              }
              elseif($commande->getTotal()<=0){
                   return  -2;
              } 
              elseif($commande->getTotalPaye()!=0){
              return -3;
              }
              else{
               $this->dao->save($commande);
               return 1 ; 
              }
           }
              public function payer($ref,$montant){
               $loaded = $this->dao->findByRef($ref);
               if($loaded == null ){
                   return  - 1 ; 
               }
   
                elseif($loaded->getTotalPaye()+ $montant > $loaded->getTotal()){
                return -2 ; 
                }
    
                else{
                $nvTotalPaye = $loaded->getTotalPaye()+ $montant;
                $loaded->setTotalPaye($nvTotalPaye);
                $this->dao->update($loaded);
                return 1  ;
               }
    }
        public function deleteByRef($ref){
          $loaded = $this->dao->findByRef($ref);
          if($loaded== null){
            return -1 ;           
          }            
          elseif($loaded->getTotalPaye()!=0){
             return -2 ;
          }
          else{
            $this->dao->deleteByref($ref);
            return 1 ;
          }
        }
        public function findById($id){
         return $this->dao->findById($id);
        }
        public function update(Commande $commande ){
          return $this->dao->update($commande);
        }
        public function findByRef($ref){
          return $this->dao->findByRef($ref);
        }
        public function findAll(){
         return $this->dao->findAll();
        }
   
      }
?>
