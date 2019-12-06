<?php
namespace App\Controller;
use Zend\Diactoros\Response\HtmlResponse;

class BaseController {
  protected $templateEngine;

  public function __construct(){
    $loader = new \Twig_Loader_Filesystem("../../views")
    $this->templateEngine = new \Twig_Environment($loader, array(
    "debug" => true,
    "cache" => false
    ));

  }

  public function renderHTML($filename, $data = []){
    return new HtmlResponse($this->templateEngine->render($filename, $data))
  }
}
