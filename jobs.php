<?php
$jobs = [
   [
     "title" => "PHP dev",
     "description" => "el mejor trabajo de la vida",
     "visible" => true,
     "months" => 16
   ] ,
   [
     "title" => "PYTHON Developer",
     "description" => "el mejor trabajo de la vida",
     "visible" => true,
     "months" => 12
   ],
   [
     "title" => "jQuery",
     "description" => "el mejor trabajo de la vida",
     "visible" => true,
     "months" => 8
   ],
   [
     "title" => "NODE Dev",
     "description" => "el mejor trabajo de la vida",
     "visible" => true,
     "months" => 9
   ]
];

$limit_months = 2000;
$total_months = 0;

function getDuration($months)
{
  $years = floor($months/12);
  $extra_months = $months%12;
  if($years == 0)
  {
    if($extra_months == 1)
    {
      return "  $extra_months month";
    }
    return " $extra_months months";
  }
   if($extra_months == 0)
  {
     if($years == 1)
     {
       return " $years year";
     }
  return  " $years years";
  }
  else {
  return " $years years, $extra_months months";
  }

}

function ImprimirTrabajos($jobs)
{
  if($jobs["visible"] == false){
    return;
  }
  echo '<li class="work-position">
  <h5>'   . $jobs["title"] . ' </h5>
  <p> ' .  $jobs["description"]. ' </p>
  <p> ' . getDuration($jobs["months"])  .  '
  <br> </p>
  <strong>Achievements:</strong>
  <ul>
    <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
  </ul>
  </li> ';
};
