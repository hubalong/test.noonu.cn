<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	
	public function page()
	{
		$page = (int) $this->uri->segment(3,1);
		$page = $page>0 ? $page-1 : 0;
		$re = $this->db->from('user')->limit(10,$page)->get();
		$list = $re->result_array();
		//$this->lv('',$list);
		echo $this->db->last_query();
		var_dump($list);
	}
	public function add(){
		$post_arr = $this->input->post();	
		
	}
}