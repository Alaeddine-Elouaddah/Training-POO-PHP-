<?php
  require_once "CommandeService.php" ; 
  require_once "CommandeDAO.php" ;
  require_once "Commande.php" ;
  class CommandeWS{
    private $service ; 
    public function __construct()
    {
         $this->service = new CommandeService();
    }
      public function deleteByref($ref){
        $response = [];        
        $result  = $this->service->deleteByref($ref);
        if($result==-1){
            $response = ["status" => "204","data" => "no data found "];
        }
        elseif($result==-2){
          $response = ["status" => "500" , "data"=>"la recommandation n'a pas pu être supprimée car le processus de paiement a déjà commencé" ];
        }
        elseif($result == 1) {
          $response =["status" => "200","data" => " Delete OK"];
        }
         return json_encode($response);
      }
      public function save(Commande $commande ){
          $response = [];
          $result = $this->service->save($commande);
          if($result== -1 ){
            $response = ["status" => "500" ,"data" =>"La commande existe déjà"] ; 
          }
        elseif($result==-2){
              $response =["status" => "500", "data"=>"Le total est negative  "];
            }
             elseif($result == 1 ){
               $response = ["status"=>"201" ,"data"=>"SAVE OK" ];
             }
             return json_encode($response);
      }
       public function payer($ref,$montant){
          $response = [];
          $result = $this->service->payer($ref,$montant);
          if($result== -1){ 
             $response = ["status"=>"500" , "data" =>"Commande n'existe pas "];
          }
          elseif($result==-2){
              $response=["status"=>"500" ,"data" =>"Montant + TotalPaye depasse totale  "];
          }
          elseif($result==1){
              $response = ["status" =>"200" ,"data" => "Payement ok "] ; 
          }
          return json_encode($response);
       }
       public function update(Commande $commande){
          $response = ["status"=>"201" ,"data" =>"Update ok "];
           $result=$this->service->update($commande);
          json_encode($response);
       }

       public function findById($id){
        $response = [] ; 
        $result =  $this->service->findById($id);
          if($result!=null){
              $response = ["status" => "200" , "data" =>$result];
          }
          else{
            $response = ["status" => "204" , "data" =>"No FOUND "];
          }
          return json_encode($response);
       }
       public function findByref($ref){
        $response = [] ; 
        $result =  $this->service->findByRef($ref);
          if($result!=null){
              $response = ["status" => "200" , "data" =>$result];
          }
          else{
            $response = ["status" => "204" , "data" =>"NOT FOUND "];
          }
          return json_encode($response);
       }
       public function findAll(){
        $response = [];
        $result=$this->service->findAll();
        if(empty($result)==false ){
           $response = ["status"=>"200" ,"data"=>$result];
        }
        else{
            $response = ["status"=>"204" ,"data"=>"notfound"];
        }
        return  json_encode($response);
       }
     }


?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
