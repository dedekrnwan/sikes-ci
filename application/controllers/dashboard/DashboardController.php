<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('template');
        // $this->load->model('User');
        // $this->load->library('form_validation');
        // if($this->session->has_userdata('user')){
        //         redirect('admin/home');
        // }
        //
        $this->data = [];
    }

    public function index()
    {
        $dataHtml1['html'] = $this->load->view('pages/dashboard/page', null, true);
        $dataHtml2['html'] = $this->load->view('pages/layout', $dataHtml1, true);
        $this->load->view('layout', $dataHtml2);
    }
}
