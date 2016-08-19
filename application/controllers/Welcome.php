<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		echo $this->session->userdata('username');
		//$this->load->helper('url');
		$post_url =  site_url('Welcome/login');
		$data = array('post_url' => $post_url);
		$this->load->view('public/login',$data);
	}
	public function test(){
        $HTTP_HOST=$_SERVER[ "HTTP_HOST"];
        echo $_SERVER[ "HTTP_HOST"];
        //if($HTTP_HOST<>"www.baidu.com")
        //{
        //    header("location:http://www.baidu.com");
        //}
        echo json_encode($_SERVER);
        echo '111';
        die;
    }
	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->db->select('password,offset');
		$this->db->from('user');
		$this->db->where(array('email' => $username));
		$this->db->limit(1);
		$re = $this->db->get();
		$re = $re->row();
		if($re && md5($password.$re->offset)===$re->password){
			//$this->load->library('session');
			$this->session->set_userdata(array('username'=>$username,'haslogin'=>1));
			echo $this->session->userdata('username');
			
			//$this->load->helper('url');
			$index_url = site_url('home/index');
			header('Location: '.$index_url);
			die;
		}else{
			//$this->load->helper('url');
			$index_url = site_url('Welcome/index');
			$this->massage_error('用户名或者密码有误',$index_url);
		}
	}
	public function login_out(){
		session_destroy();
		$this->load->helper('url');
		$index_url = site_url('welcome/index');
		header('Location: '.$index_url);
		die;
	}
}
