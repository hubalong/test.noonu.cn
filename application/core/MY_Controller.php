<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	protected $menu;
	function __construct(){
		parent::__construct();
		$haslogin = $this->session->userdata('haslogin');
		if($haslogin!=1){
			$this->load->helper('url');
			header("location:".site_url('welcome/index'));
			die;
		}
		// ²Ëµ¥Ñ¡ÖÐ×´Ì¬
		$this->get_active();

		$obj_menu = $this->menu;
		$this->search_menu_fun = function($a=0,$b=0) use ($obj_menu){
		 	if($a===$obj_menu[0]&&$b===$obj_menu[1]||$a===$obj_menu[0]&&$b===0){
		 		echo 'class="active"';
		 	}
		};

	}
	private function get_active(){
		$menu = array(
				'home,index'=>[1,1],
				"user,add" =>[2,1]
			);
		$class_name = $this->router->class;
		$class_method = $this->router->method;
		if(isset($menu[$class_name.','.$class_method]))
			$this->menu = $menu[$class_name.','.$class_method];
		else
			$this->menu = [];
		//echo $this->router->class;
	}
	public function lv($view,$data=''){
		
		$this->load->view('public/header');
	    $this->load->view('public/menu',['menu_function'=>$this->search_menu_fun]);
	    $this->load->view($view,$data);
	    $this->load->view('public/footer');
	}
}