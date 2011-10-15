<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$userid = $this->session->userdata('userid');
		if($userid <= 0) {
			header("Location: /manage/login");
			exit;
		}
	}
	function index()
	{
		header("Location: /manage/welcome");
		exit;
	}
	/*
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
}