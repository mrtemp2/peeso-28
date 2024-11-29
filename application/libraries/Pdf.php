<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once 'dompdf/vendor/autoload.php';

use Dompdf\Dompdf;

use Dompdf\Options;


class Pdf extends Dompdf
{
 private $options;
 public function __construct()
 {
  $this->options = new Options();
   parent::__construct();
 } 
 public function setPdfOptions($key,$value){
    $this->options->set($key,$value);
    $this->setOptions($this->options);

 }
 
}

?>
