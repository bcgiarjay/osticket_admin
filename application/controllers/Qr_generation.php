<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Qr_generation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "QR Generation";
        $this->load->view('qr_generation/index');
    }

}

