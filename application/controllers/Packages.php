<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Package Master File";
        $this->load->view('template/header', $data);
        $this->load->view('package/index',   $data);
        $this->load->view('template/footer', $data);
    }

}

