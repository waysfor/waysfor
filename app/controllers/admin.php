<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$userid = $this->session->userdata('userid');
		if($userid <= 0) {
			if($this->uri->segment(2) != 'login' 
				&& $this->uri->segment(2) != 'logout') {
				header("Location: /admin/login");
				exit;
			}
		}
	}
	function index()
	{
		header("Location: /admin/welcome");
		exit;
	}
	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username != '' && $password != '') {
			$this->load->model('adminmodel');
			$userid = $this->adminmodel->check_login($username, $password);
			if($userid > 0) { //login success
				$remain = $this->input->post('remain');
				$userdata = array('userid' => $userid, 'username' => $username);
				$this->session->set_userdata($userdata);
				header("Location: /admin/welcome");
				exit;
			}
		} else {
			$this->load->view('admin/login');
		}
	}
	function logout()
	{
		$userdata = array('username' => '', 'userid' => 0);
		$this->session->set_userdata($userdata);
		header("Location: /admin/login");
		exit;
	}
	function welcome()
	{
		$this->load->view('admin/welcome');
	}
	function open($act = 'list')
	{
		switch($act) {
			case 'list':
				break;
			case 'add':
				break;
			case 'edit':
				break;
			case 'delete':
				break;
			default:
				break;
		}
	}
	/*
	function train($act = 'list')
	{
		switch($act) {
			case 'list':
				break;
			case 'add':
				break;
			case 'edit':
				break;
			case 'delete':
				break;
			default:
				break;
		}
	}
	function trainer($act = 'list')
	{
		switch($act) {
			case 'list':
				break;
			case 'add':
				break;
			case 'edit':
				break;
			case 'delete':
				break;
			default:
				break;
		}
	}
	function news($act = 'list')
	{
		switch($act) {
			case 'list':
				break;
			case 'add':
				break;
			case 'edit':
				break;
			case 'delete':
				break;
			default:
				break;
		}
	}
	function resource($act = 'list')
	{
		switch($act) {
			case 'list':
				break;
			case 'add':
				break;
			case 'edit':
				break;
			case 'delete':
				break;
			default:
				break;
		}
	}
	function member($act = 'list')
	{
		switch($act) {
			case 'list':
				break;
			case 'add':
				break;
			case 'edit':
				break;
			case 'delete':
				break;
			default:
				break;
		}
	}
	function robot($act = 'list')
	{
		switch($act) {
			case 'list':
				break;
			case 'add':
				break;
			case 'edit':
				break;
			case 'delete':
				break;
			default:
				break;
		}
	}
	*/
	
	
	/*
	function add($sort){
		if($sort == 'open'){
			$this->load->view('manage/edit');
		}
		elseif($sort == 'train'){
			$this->load->view('manage/edit');
		}
		elseif($sort == 'trainer'){
			$this->load->view('manage/edit');
		}
		elseif($sort == 'news'){
			$this->load->view('manage/edit');
		}
		elseif($sort == 'resource'){
			$this->load->view('manage/edit');
		}
		elseif($sort == 'member'){
			$this->load->view('manage/edit');
		}
		elseif($sort == 'robot'){
			$this->load->view('manage/edit');
		}
	}
	function open($type = '')
	{
		if($type == '') {
			$this->load->view('manage/lists');
		} elseif($type == 'cate') {
			$this->load->view('manage/cate');
		}
	}
	function train()
	{
		$this->load->view('manage/lists');
	}
	function trainer()
	{
		$this->load->view('manage/lists');
	}
	function news()
	{
		$this->load->view('manage/lists');
	}
	function resource()
	{
		$this->load->view('manage/lists');
	}
	function member()
	{
		$this->load->view('manage/lists');
	}
	*/
}