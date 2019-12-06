<?php
namespace App\Controller;
  use App\models\PROJECT1;

class projectController extends BaseController{
  public function getAddProjectAction(){

    if(!empty($_POST)){
      $project = new PROJECT1();
      $project->title = $_POST["title"];
      $project->description = $_POST["description"];
      $project->save();
    }
       echo $this->renderHTML('addproject.twig');
  }

}
