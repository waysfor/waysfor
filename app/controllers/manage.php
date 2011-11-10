<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
  public $act;
  public $userid;
  public $username;
  public $realname;

  function __construct() {
    parent::__construct();
    $user = $this->session->userdata('user');
    $this->userid = isset($user['id']) ? $user['id'] : 0;
    $this->username = isset($user['name']) ? $user['name'] : 0;
    $this->realname = isset($user['real']) ? $user['real'] : 0;
    if($this->userid <= 0) {
      $this->act = $this->uri->segment(2);
      if($this->act != 'login' && $this->act != 'logout') {
        header("Location: /manage/login");
        exit;
      }
    }
  }

  function index() { //后台管理默认页面
    $out = array();
    $out['user']['id'] = $this->userid;
    $out['user']['name'] = $this->username;
    $out['user']['real'] = $this->realname;
    $this->load->view('manage/header.html');
    $this->load->view('manage/index.html', $out);
    $this->load->view('manage/footer.html');
  }

  function login() {
    if($this->input->is_post()) { //post
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $this->load->model('usermodel');
      $user = $this->usermodel->login($username, $password);
      print_r($user);exit;
      if(empty($user)) { //登录失败
        
      } else { //登录成功
        
      }
    } else { //page
      $this->load->view('manage/header-login.html');
      $this->load->view('manage/login.html');
      $this->load->view('manage/footer-login.html');
    }
  }
}