<?php

namespace App\Models;


class Job extends BaseElement{
  public function __construct($title, $description){
    $newTitle = "job: $title";
    parent:: __construct($newTitle, $description);
  }


}
