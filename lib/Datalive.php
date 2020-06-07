<?php
require('Api.php');

/**
 *
 */
class Datalive extends Api
{

  public $world = "https://thevirustracker.com/free-api?global=stats";

  public $country = "https://api.thevirustracker.com/free-api?countryTotal=";

  public function __construct()
  {
    parent::__construct();
    // code...
  }

  public function worldwide(){
    $result = $this->init($this->world);
    if (!$result['errno']) {
      // code...
      $data = json_decode($result['content']);
      foreach ($data->results as $value) {
        $output = (array)$value;
      }
      return $output;
    }else{
      echo json_encode(array('error' => 1, 'Request Not allow'));
    }
  }
  public function countrystatistics($countryname){
      $result = $this->init($this->country.$countryname);
      if (!$result['errno']) {

        $data = json_decode($result['content']);
        foreach ($data->countrydata as $value) {
          $output = (array)$value;
        }
        return $output;
      }else{
        echo json_encode(array('error' => 1, 'Request Not allow'));
      }
  }
}

$v = new Datalive();
$v->countrystatistics("IN");
