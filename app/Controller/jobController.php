<?php

namespace App\Controller;


use Respect\Validation\Validator as v;
use App\models\JOB1;

class jobController extends BaseController{

  public function getAddJobAction($request){
  $responseMessage = null;
    if($request->() == "POST"){
      $jobValidator = v::key('title', v::stringType()->notEmpty())
                  ->key('description', v::stringType()->notEmpty());


    try {
      $jobValidator->assert($postdata); // true

       $postdata = $request->getParseBody();

       $files = $request->getUploadedFiles();
       $logo = $files["logo"];
       if($logo->getError() == UPLOAD_ERR_OK){
         $filename = $logo->getClientName();
         $logo->moveTo("uploads/$filename");
       }

       $job = new JOB1();
       $job->title = $postdata["title"];
       $job->description = $postdata["description"];
       $job->save();
       $responseMessage = "succeed!";
    } catch (\Exception $e) {
      $responseMessage = $e->getMessage();
    }

    }

    echo $this->renderHTML('addjob.twig', [
      "responseMessage" => $responseMessage = "saved"
    ]);

  }
}
