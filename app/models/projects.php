<?php


namespace App\Models;



class projects extends BaseElement{
  public function __construct($title, $description){
    $nTitle = "P: $title";
    $this->title = $nTitle;
    $newDescription = "esta es la $description";
    $this->description = $newDescription;
  }
};

$project1 = new Projects("Project1", "descripcion");

$project = [
  $project1
];
