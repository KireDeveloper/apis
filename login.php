<?php

 //we include the database.
 include("class/class.db.php");

 //This is a quick and easy login.
 CLASS LOGIN EXTENDS db{
  //put the name of your user table
  private $user = "users";

  //Write the data you want back.
  private $dataR = "token";

  public function auth($jf = ""){
  if(empty($jf)) return "param emtpy";

  $dr = ($this->dataR != "")? $this->dataR: ($erno = "there are no rows");

  $sql = "SELECT {$dr} FROM {$this->user} WHERE username = :username AND password = :password";

   if(($a_z = parent::c()->prepare($sql))){
    if($a_z->execute($jf)){
    return ($a_z->rowcount())?($a_z->fetch(PDO::FETCH_OBJ)): "you don't have access";
    } ELSE return ($erno != "")? $erno: "the row {$this->dataR}, does not exist";
   } ELSE return "there was an error in the request";

  }//END:function
 }//END: function
 
 //hacer una petición al server
 $response = (NEW\LOGIN())->auth([
 ":username" => "erik2001",
 ":password" => "jaimes2001"
 ]);

 //this returns: token of user, otherwise it returns an error.
?>
