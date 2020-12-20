<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    public $CI = NULL;
    function __construct(){
        parent::__construct();
        $this->load->model('Api_model');
    }
    public function fetch_all($tablename)
    {
        $fetched_data = $this->Api_model->fetch_data($tablename);
        echo json_encode($fetched_data);
    }


}
?>