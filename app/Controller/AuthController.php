<?php

namespace App\Controllers;
use Zend\Diactoros\Response\RedirectResponse;

use App\Models\USER;
use Respect\Validation\Validator as v;

class AuthController extends BaseController{

  public function getLogin(){

      $responseMessage = $_SESSION['mensaje']??null;
      return $this->renderHTML('auth.twig',[
     'responseMessage'=>$responseMessage
      ]);
  }

  public function postLogin(){
    $postData = $request->getParsedBody();
    $user = USER::where("email", $postData["email"])->first();
    if($user){
              if( \password_verify($postData["password"], $user->password)  ){
                $_SESSION["userId"] = $user->id;
                echo "found";
                return new RedirectResponse("/admin")
              }
              else{
                echo "bad credentials";
              }
    }
    else{
        echo "bad credentials";
    }

    return $this->renderHTML("auth.twig", [
      "responseMessage" => $responseMessage
    ])


  }

  public function getLogOut(){
    unset($_SESSION["userId"]);
    return new RedirectResponse("/admin");
  }



}
