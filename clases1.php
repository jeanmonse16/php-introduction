<?php



use App\models\JOB1;
use App\models\PROJECT1;


$job = JOB1::all();
$Project = PROJECT1::all();





$limit_months = 2000;
$total_months = 0;


function ImprimirTrabajos($jobs)
{

  echo '<li class="work-position">
  <h5>'   . $jobs->title. ' </h5>
  <p> ' .  $jobs->description . ' </p>
  <p> ' . $jobs->getDurationAsString($jobs->months)  .  '
  <br> </p>
  <strong>Achievements:</strong>
  <ul>
    <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
    <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
  </ul>
  </li> ';
};
