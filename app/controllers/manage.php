<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$userid = $this->session->userdata('userid');
		if($userid > 0){
			header("Location: /manage/welcome");
			exit;
		}else{
			header("Location: /manage/login");
			exit;
		}
	}
	function logout()
	{
		$userdata = array('username' => '', 'userid' => 0);
		$this->session->set_userdata($userdata);
		header("Location: /manage/login");
		exit;
	}
	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username != '' && $password != '') {
			$this->load->model('managemodel');
			$userid = $this->managemodel->check_login($username, $password);
			if($userid > 0) { //login success
				$remain = $this->input->post('remain');
				$userdata = array('userid' => $userid, 'username' => $username);
				$this->session->set_userdata($userdata);
				header("Location: /manage/welcome");
				exit;
			}
		} else {
			$this->load->view('manage/login');
		}
	}
	function welcome()
	{
		$userid = $this->session->userdata('userid');
		if($userid > 0){
			$data['title'] = '上海聚宇企业管理咨询后台管理 -- 欢迎页';
			$this->load->view('manage/welcome',$data);
		} else {
			header("Location: /manage/login");
			exit;
		}
	}
	function edits()
	{
		$userid = $this->session->userdata('userid');
		if($userid > 0){
			$this->load->view('manage/edit');
		} else {
			header("Location: /manage/login");
			exit;
		}
	}
	function lists()
	{
		$this->load->view('manage/lists');
	}
}