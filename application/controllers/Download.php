<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'tgl_indo', 'download'));
    }

    public function index()
    {
        force_download('asset/dist/img/landing/brosur.jpg', NULL);
    }
}
