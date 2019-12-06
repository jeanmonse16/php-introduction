<?php

namespace App\Controller;
use App\models\JOB1;
use App\models\PROJECT1;


class indexController extends BaseController{
  public function indexAction()
  {
    $job = JOB1::all();
    $Project = PROJECT1::all();

    $limit_months = 2000;
    $total_months = 0;

    echo $this->renderHTML('index.twig', [
      "jobs" => $jobs
    ]);
  }
}
