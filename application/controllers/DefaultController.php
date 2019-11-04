<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DefaultController extends CI_Controller
{
	public function index()
	{
		redirect('auth/login');
	}
	
	public function delete() {
		$p = $this->input->post();
		$this->db->where($p['key'], $p['val']);
    $this->db->update($p['table'], ['active' => 0]);
		$affected = $this->db->affected_rows();	
		if($affected >= 1) echo json_encode(true);
	}
}
