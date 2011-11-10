<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
  public $nav;
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
    //生成导航菜单
    $this->_nav();
  }

  private function _nav() {
    $this->nav = $this->load->view('manage/nav.html', '', true);
  }

  function index() { //后台管理默认页面
    $out = array();
    $out['user']['id']   = $this->userid;
    $out['user']['name'] = $this->username;
    $out['user']['real'] = $this->realname;
    $usercookie  = $this->input->cookie('user');
    $usercookie  = json_decode($usercookie, true);
    $out['user'] = array_merge($out['user'], $usercookie);

    $out['nav'] = $this->nav;
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
      $role = isset($user['role']) ? $user['role'] : 0;
      $res = array();
      $res['stat'] = 0;
      $res['data'] = array();
      if($role <= 0) { //登录失败
        $res['stat'] = 1;
      } else { //登录成功
        //userid username realname写入到session
        $usersess = array();
        $usersess['id'] = $user['id'];
        $usersess['name'] = $user['username'];
        $usersess['real'] = $user['realname'];
        $this->session->set_userdata(array('user' => $usersess));
        //role addtm lasttm lastip 写入到cookie
        $usercookie = array();
        $rolearray = array(
          0 => '普通用户',
          1 => '初级管理员',
          2 => '高级管理员',
          3 => '超级管理员'
        );
        $usercookie['role'] = $rolearray[$role];
        $usercookie['addtm'] = date('Y-m-d H:i:s', $user['addtm']);
        $usercookie['lasttm'] = date('Y-m-d H:i:s', $user['lasttm']);
        $usercookie['lastip'] = long2ip($user['lastip']);
        $usercookie = json_encode($usercookie);
        $cookie = array(
          'name'   => 'user',
          'value'  => $usercookie,
          'expire' => 60*60*24*1000 //1000天过期时间
        );
        $this->input->set_cookie($cookie);
        $res['data'] = $user;
      }
      echo json_encode($res);
      exit;
    } else { //page
      $this->load->view('manage/header-login.html');
      $this->load->view('manage/login.html');
      $this->load->view('manage/footer-login.html');
    }
  }

  function logout() {
    //清理session
    $this->session->unset_userdata('user');
    //清理cookie
    $cookie = array(
      'name'   => 'user',
      'value'  => '',
      'expire' => ''
    );
    $this->input->set_cookie($cookie);
    //跳转到登录页
    echo '<script>window.location.href="/manage/login";</script>';
    exit;
  }
}