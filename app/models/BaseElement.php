<?php


namespace  App\Models;




class BaseElement implements Printable{
  protected $title;
  public $description;
  public $visible = true;
  public $months;

  public function __construct($title, $description)
  {
    $this->setTitle($title);
    $this->description = $description;
  }


  public function setTitle($t){
    if($t == "")
    {
      $this->title = "N/A";
    }
    else {
       $this->title = $t;
    }

  }

  public function getTitle(){
    return $this->title;
  }

  public function getDurationAsString($months)
  {
    $years = floor($months/12);
    $extra_months = $months%12;
    $year = "year";
    $month ="month";

    if($years == 0)
    {
      if($extra_months == 1)
      {
        return "job duration: $extra_months month";
      }
      return "job duration: $extra_months months";
    }
     if($extra_months == 0 )
    {
       if($years == 1)
       {
         return "job duration: $years year";
       }
    return  "job duration: $years years";
    }
    else {
    return "job duration:  $years years, $extra_months months";
    }

  }


  public function getDescription()
    {
     return $this->description;
    }

}
