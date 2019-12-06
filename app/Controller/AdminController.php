<?php

namespace App\Controllers;
use App/models/{JOB1, PROJECT1};

class AdminController extends BaseController{
  public function getIndex(){
    return $this->renderHTML("admin.twig")
  }
}
