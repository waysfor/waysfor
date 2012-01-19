<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
	public $item;
	public $act;
	public $userid;
	public $username;
	public $realname;

	function __construct() {
		parent::__construct();
		$this->load->library('pagination');
		$user = $this->session->userdata('user');
		$this->userid = isset($user['id']) ? $user['id'] : 0;
		$this->username = isset($user['name']) ? $user['name'] : 0;
		$this->realname = isset($user['real']) ? $user['real'] : 0;
		$this->item = $this->uri->segment(2);
		//如果用户没有登录
		if($this->userid <= 0) {
			if($this->item != 'login' && $this->item != 'logout') {
				header("Location: /manage/login");
				exit;
			}
		}
		$this->act = $this->uri->segment(3);
		//载入manage config
		$this->config->load('manage');
		$navarray = $this->config->item('nav');
		$navitem = array();
		foreach($navarray as $k=>$v) {
			$navitem[$k] = $v['item'];
		}
		$this->_header();
	}

  /**
   * 根据地址生成菜单
   */
	private function _nav() {
		$nav = $this->config->item('nav');
		//开始按照seq排序处理
		$navlist = array();
		foreach($nav as $v) {
			$sub = $v['sub'];
			$sublist = array();
			foreach($sub as $vv) {
				$sublist[$vv['seq']] = $vv;
			}
			ksort($sublist);
			$v['sub'] = $sublist;
			$navlist[$v['seq']] = $v;
		}
		ksort($navlist);
		$out['nav']  = $navlist;
		$out['item'] = $this->item;
		$out['act']  = $this->act;
		return $this->load->view('manage/nav.html', $out, true);
	}

  /**
   * 根据菜单地址 生成头部并输出
   */
	private function _header() {
		if($this->item != 'login' && $this->item != 'logout') {
			//生成导航菜单
			$header['nav'] = $this->_nav();
			$header['user']['id'] = $this->userid;
			//输出头部
			$this->load->view('manage/header.html', $header);
		}
	}

	function index() { //后台管理默认页面
		$out = array();
		$out['user']['id']   = $this->userid;
		$out['user']['name'] = $this->username;
		$out['user']['real'] = $this->realname;
		$usercookie  = $this->input->cookie('user');
		$usercookie  = json_decode($usercookie, true);
		$out['user'] = array_merge($out['user'], $usercookie);
		$this->load->view('manage/index.html', $out);
		$this->load->view('manage/footer.html');
	}

	function login() { //后台管理登录
		if($this->input->is_post()) { //post
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('user_course_model');
			$user = $this->user_course_model->login($username, $password);
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
			$this->session->set_userdata(array('user' => $usersess));	//role addtm lasttm lastip 写入到cookie
			$usercookie = array();
			$rolearray = $this->config->item('role');
			$statusarray = $this->config->item('status');
			$genderarray = $this->config->item('gender');
			$usercookie['role'] = $rolearray[$role];
			$usercookie['addtm'] = date('Y-m-d H:i:s', $user['addtm']);
			$usercookie['lasttm'] = date('Y-m-d H:i:s', $user['lasttm']);
			$usercookie['lastip'] = long2ip($user['lastip']);
			//$result = $this -> user_course_model -> edit_save($data,$con);
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

  //后台管理登出
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
  
  //后台课程管理
  function history($act = '', $val = 0) { 
    $this->load->model('history_model');
    switch($act) {
      case 'list':
		$this -> load -> helper('url');
		$offset = $this -> uri -> segment(4,0);
		$my_page= array();
		$my_page['sub_num'] = '10';
		$my_page['all_num'] = $this -> history_model -> getAllrows();
		$my_page['url'] = '/manage/history/list/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(4,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];

        $out = array();
		$classlist = $this->history_model->get('','',$offset,$my_page['sub_num']);
        $courseout = array();
        $statusarray = $this->config->item('status');
        $typearray = $this->config->item('type');
        foreach($classlist as $class_course) {
		  $class_course['status'] = $statusarray[$class_course['status']];
		  $class_course['type'] = $typearray[$class_course['classtype']];
          $courseout[] = $class_course;
        }
		$out['my_page'] = $my_page;
        $out['class_course'] = $courseout;
        $this->load->view('manage/history/list.html', $out);
        $this->load->view('manage/footer.html');
        break;
      case 'add':
        if($this->input->is_post()) { //post
          
        } else {
          $this->load->view('manage/history/add.html');
          $this->load->view('manage/footer.html');
        }
        break;
	  case 'add_save':
		$data['status'] = $_POST['status'];
		$data['classname'] = $_POST['classname'];
		$data['price'] = $_POST['price'];
		$data['opentime'] = $_POST['opentime'];
		$data['classtype'] = $_POST['classtype'];
		$data['object'] = $_POST['object'];
		$data['classcontent'] = $_POST['classcontent'];
		$data['trainername'] = $_POST['trainername'];
		$data['trainercontent'] = $_POST['trainercontent'];
		$data['recommend'] = $_POST['recommend'];
		$data['posttime'] = date("Y-m-d h:i:s");
		$result = $this -> history_model -> add($data);
		break;
	  case 'del':
	    $id = $val;
		$result = $this -> history_model -> del($id);
		break;
      case 'edit':
        if($this->input->is_post()) { //post
          
        } else {
		  $id = $val;
		  $result = $this -> history_model -> edit($id);
          $statusarray = $this->config->item('status');
		  $out['class_course'] = $result;
          $this->load->view('manage/history/edit.html', $out);
          $this->load->view('manage/footer.html');
        }
        break;
      case 'edit_save':
        $data['id'] = $_POST['id'];
		$data['status'] = $_POST['status'];
		$data['classname'] = $_POST['classname'];
		$data['price'] = $_POST['price'];
		$data['opentime'] = $_POST['opentime'];
		$data['classtype'] = $_POST['classtype'];
		$data['object'] = $_POST['object'];
		$data['classcontent'] = $_POST['classcontent'];
		$data['trainername'] = $_POST['trainername'];
		$data['trainercontent'] = $_POST['trainercontent'];
		$data['recommend'] = $_POST['recommend'];
		$data['posttime'] = date("Y-m-d h:i:s");
		
        $con = "id = " . $data['id']; 
        unset($data['id']);
		$result = $this -> history_model -> edit_save($data,$con);
        break;
      case 'info':
        $history = $this->history_model->get("`id` = '$val'");
        if(isset($history[0])) {
          $history = $history[0];
          $statusarray = $this->config->item('status');
          $typearray = $this->config->item('type');
          $recommendarray = $this->config->item('recommend');
          $history['status'] = $statusarray[$history['status']];
          $history['type'] = $typearray[$history['classtype']];
          $history['recommend'] = $recommendarray[$history['recommend']];
          $out = array();
          $out['history'] = $history;
          $this->load->view('manage/history/info.html', $out);
          $this->load->view('manage/footer.html');
        } else {
          show_404();
        }
        break;
		case 'autoTip_class':
			$keyWord = $_GET['keyWord'];
			$data=array();
			$temp=array();
			$this->load->model('class_course_model');
			$datas=array();
			$temp = $this->class_course_model->get("`classname` like '%".$keyWord."%'","","","");
			if (count($temp) != '0'){
				$data['status']=1;
				$data['list']=array();
				foreach($temp as $key=>$val){
					$datas['id']=$val['id'];
					$datas['name']=$val['classname'];
					$datas['status']=$val['status'];
					$datas['classtype']=$val['classtype'];
					$datas['object']=$val['object'];
					$datas['content']=$val['content'];
					array_push($data['list'],$datas);
				}
			}else{
				$data['status']=0;
			}
			echo json_encode($data);
			exit;
		break;
		case 'autoTip_trainer':
			$keyWord = $_GET['keyWord'];
			$data=array();
			$temp=array();
			$this->load->model('trainer_course_model');
			$datas=array();
			$temp = $this->trainer_course_model->get("`name` like '%".$keyWord."%'","","","");
			if (count($temp) != '0'){
				$data['status']=1;
				$data['list']=array();
				foreach($temp as $key=>$val){
					$datas['id']=$val['id'];
					$datas['name']=$val['name'];
					$datas['content']=$val['content'];
					array_push($data['list'],$datas);
				}
			}else{
				$data['status']=0;
			}
			echo json_encode($data);
			exit;
		break;
      default:
        show_404();
        break;
    }
  }
  
  //后台课程资源管理
  function course_resource($act = '', $val = 0) { 
    $this->load->model('class_course_model');
    switch($act) {
      case 'list':
		$this -> load -> helper('url');
		$offset = $this -> uri -> segment(4,0);
		$my_page= array();
		$my_page['sub_num'] = '10';
		$my_page['all_num'] = $this -> class_course_model -> getAllrows();
		$my_page['url'] = '/manage/course_resource/list/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(4,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];

        $out = array();
		$classlist = $this->class_course_model->get('','',$offset,$my_page['sub_num']);
        $courseout = array();
        $statusarray = $this->config->item('status');
        $typearray = $this->config->item('type');
        foreach($classlist as $class_course) {
		  $class_course['status'] = $statusarray[$class_course['status']];
		  $class_course['type'] = $typearray[$class_course['classtype']];
          $courseout[] = $class_course;
        }
		$out['my_page']=$my_page;
        $out['class_course'] = $courseout;
        $this->load->view('manage/course_resource/list.html', $out);
        $this->load->view('manage/footer.html');
        break;
      case 'add':
        if($this->input->is_post()) { //post
          
        } else {
          $this->load->view('manage/course_resource/add.html');
          $this->load->view('manage/footer.html');
        }
        break;
	  case 'add_save':
		$data['status'] = $_POST['status'];
		$data['classname'] = $_POST['name'];
		$data['classtype'] = $_POST['classtype'];
		$data['object'] = $_POST['object'];
		$data['content'] = $_POST['content'];
		$data['listtime'] = date("Y-m-d h:i:s");
		$data['entertime'] = date("Y-m-d h:i:s");
		
		$result = $this -> class_course_model -> add($data);
		break;
	  case 'del':
	    $id = $val;
		$result = $this -> class_course_model -> del($id);
		break;
      case 'edit':
        if($this->input->is_post()) { //post
          
        } else {
		  $id = $val;
		  $result = $this -> class_course_model -> edit($id);
          $statusarray = $this->config->item('status');
		  $out['class_course'] = $result;
          $this->load->view('manage/course_resource/edit.html', $out);
          $this->load->view('manage/footer.html');
        }
        break;
      case 'edit_save':
        $data['id'] = $_POST['id'];
		$data['status'] = $_POST['status'];
		$data['classname'] = $_POST['name'];
		$data['classtype'] = $_POST['classtype'];
		$data['object'] = $_POST['object'];
		$data['content'] = $_POST['content'];
		$data['listtime'] = date("Y-m-d h:i:s");
		
        $con = "id = " . $data['id']; 
        unset($data['id']);
		$result = $this -> class_course_model -> edit_save($data,$con);
        break;
		case 'autoTip_class':
			$keyWord = $_GET['keyWord'];
			$data=array();
			$temp=array();
			$this->load->model('class_course_model');
			$temp = $this->class_course_model->get("`classname` like '%".$keyWord."%'","","","");
			if (count($temp) != '0'){
				$data['status']=1;
				$data['list']=array();
				foreach($temp as $key=>$val){
					array_push($data['list'],$val['classname']);
				}
			}else{
				$data['status']=0;
			}
			echo json_encode($data);
			exit;
		break;
      default:
        show_404();
        break;
    }
  }
  
  //后台讲师资源管理
  function trainer_resource($act = '', $val = 0) { 
    $this->load->model('trainer_course_model');
    switch($act) {
      case 'list':
		$this -> load -> helper('url');
		$offset = $this -> uri -> segment(4,0);
		$my_page= array();
		$my_page['sub_num'] = '10';
		$my_page['all_num'] = $this -> trainer_course_model -> getAllrows();
		$my_page['url'] = '/manage/trainer_resource/list/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(4,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];

        $out = array();
		$trainerlist = $this->trainer_course_model->get('','',$offset,$my_page['sub_num']);
        $trainerout = array();
        $genderarray = $this->config->item('gender');
        $typearray = $this->config->item('type');
        foreach($trainerlist as $trainer_course) {
		  $trainer_course['gender'] = $genderarray[$trainer_course['gender']];
		  $trainer_course['type'] = $typearray[$trainer_course['trainertype']];
          $trainerout[] = $trainer_course;
        }

		$out['my_page']=$my_page;
        $out['trainer_course'] = $trainerout;
        $this->load->view('manage/trainer_resource/list.html', $out);
        $this->load->view('manage/footer.html');
        break;
      case 'add':
        if($this->input->is_post()) { //post
          
        } else {
          $this->load->view('manage/trainer_resource/add.html');
          $this->load->view('manage/footer.html');
        }
        break;
	  case 'add_save':
		//姓氏处理 $data['fname'] = substr($_POST['trainername'],1);
		$data['name'] = $_POST['trainername'];
		$data['gender'] = $_POST['gender'];
		$data['age'] = $_POST['age'];
		$data['exp'] = $_POST['exp'];
		$data['city'] = $_POST['city'];
		$data['tel'] = $_POST['tel'];
		$data['trainertype'] = $_POST['trainertype'];
		$data['object'] = $_POST['object'];
		$data['content'] = $_POST['content'];
		$data['price'] = $_POST['price'];
		$data['back'] = $_POST['back'];
		$data['listtime'] = date("Y-m-d h:i:s");
		$data['entertime'] = date("Y-m-d h:i:s");
		
		$result = $this -> trainer_course_model -> add($data);
		break;
	  case 'del':
	    $id = $val;
		$result = $this -> trainer_course_model -> del($id);
		break;
      case 'edit':
        if($this->input->is_post()) { //post
          
        } else {
		  $id = $val;
		  $result = $this -> trainer_course_model -> edit($id);
          $statusarray = $this->config->item('status');
		  $out['trainer_course'] = $result;
          $this->load->view('manage/trainer_resource/edit.html', $out);
          $this->load->view('manage/footer.html');
        }
        break;
      case 'edit_save':
        $data['id'] = $_POST['id'];
		$data['name'] = $_POST['trainername'];
		$data['gender'] = $_POST['gender'];
		$data['age'] = $_POST['age'];
		$data['exp'] = $_POST['exp'];
		$data['city'] = $_POST['city'];
		$data['tel'] = $_POST['tel'];
		$data['trainertype'] = $_POST['trainertype'];
		$data['object'] = $_POST['object'];
		$data['content'] = $_POST['content'];
		$data['price'] = $_POST['price'];
		$data['back'] = $_POST['back'];
		$data['listtime'] = date("Y-m-d h:i:s");
		
        $con = "id = " . $data['id']; 
        unset($data['id']);
		$result = $this -> trainer_course_model -> edit_save($data,$con);
        break;
		case 'autoTip_trainer':
			$keyWord = $_GET['keyWord'];
			$data=array();
			$temp=array();
			$datas=array();
			$this->load->model('trainer_course_model');
			$temp = $this->trainer_course_model->get("`name` like '%".$keyWord."%'","","","");
			if (count($temp) != '0'){
				$data['status']=1;
				$data['list']=array();
				foreach($temp as $key=>$val){
					array_push($data['list'],$val['name']);
				}
			}else{
				$data['status']=0;
			}
			echo json_encode($data);
			exit;
		break;
      default:
        show_404();
        break;
    }
  }
  
  //后台客户资源管理
  function client_resource($act = '', $val = 0) { 
	$owner = $this->session->userdata['user']['id'];
    $this->load->model('client_course_model');
    $this->load->model('user_course_model');
    switch($act) {
      case 'list':
	  	$user = $this->user_course_model->get($where = 'id ='.$owner);
	  	$uer['role'] = $user[0]['role'];
		
		$this -> load -> helper('url');
		$offset = $this -> uri -> segment(4,0);
		$my_page= array();
		$my_page['sub_num'] = '10';
		$my_page['all_num'] = $this -> client_course_model -> getAllrows();
		$my_page['url'] = '/manage/client_resource/list/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(4,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
        $out = array();
		if($uer['role'] != '3'){
			$trainerlist = $this->client_course_model->get('owner = '.$owner,'',$offset,$my_page['sub_num']);
		}else{
			$trainerlist = $this->client_course_model->get('','',$offset,$my_page['sub_num']);
		}
        $trainerout = array();
        $genderarray = $this->config->item('gender');
        foreach($trainerlist as $trainer_course) {
		  $trainer_course['gender'] = $genderarray[$trainer_course['gender']];
          $trainerout[] = $trainer_course;
        }

		$out['my_page'] = $my_page;
        $out['trainer_course'] = $trainerout;
        $this->load->view('manage/client_resource/list.html', $out);
        $this->load->view('manage/footer.html');
        break;
      case 'add':
        if($this->input->is_post()) { //post
          
        } else {
          $this->load->view('manage/client_resource/add.html');
          $this->load->view('manage/footer.html');
        }
        break;
	  case 'add_save':
		$data['clientname'] = $_POST['clientname'];
		$data['province'] = $_POST['province'];
		$data['linkname'] = $_POST['linkname'];
		$data['gender'] = $_POST['gender'];
		$data['title'] = $_POST['title'];
		$data['tel'] = $_POST['tel'];
		$data['email'] = $_POST['email'];
		$data['relationship'] = $_POST['relationship'];
		$data['demand'] = $_POST['demand'];
		$data['back'] = $_POST['back'];
		$data['listtime'] = date("Y-m-d h:i:s");
		$data['entertime'] = date("Y-m-d h:i:s");
		$data['owner'] = $owner;
		
		$result = $this -> client_course_model -> add($data);
		break;
	  case 'del':
	    $id = $val;
		$result = $this -> client_course_model -> del($id);
		break;
      case 'edit':
        if($this->input->is_post()) { //post
          
        } else {
		  $id = $val;
		  $result = $this -> client_course_model -> edit($id);
          $statusarray = $this->config->item('status');
		  $out['client_course'] = $result;
          $this->load->view('manage/client_resource/edit.html', $out);
          $this->load->view('manage/footer.html');
        }
        break;
      case 'edit_save':
        $data['id'] = $_POST['id'];
		$data['clientname'] = $_POST['clientname'];
		$data['province'] = $_POST['province'];
		$data['linkname'] = $_POST['linkname'];
		$data['gender'] = $_POST['gender'];
		$data['title'] = $_POST['title'];
		$data['tel'] = $_POST['tel'];
		$data['email'] = $_POST['email'];
		$data['relationship'] = $_POST['relationship'];
		$data['demand'] = $_POST['demand'];
		$data['back'] = $_POST['back'];
		$data['listtime'] = date("Y-m-d h:i:s");
		
        $con = "id = " . $data['id']; 
        unset($data['id']);
		$result = $this -> client_course_model -> edit_save($data,$con);
        break;
      default:
        show_404();
        break;
    }
  }

//后台用户资源管理
  function user($act = '', $val = 0) {
    $this->load->model('user_course_model');
    switch($act) {
      case 'list':
		$this -> load -> helper('url');
		$offset = $this -> uri -> segment(4,0);
		$my_page= array();
		$my_page['sub_num'] = '10';
		$my_page['all_num'] = $this -> user_course_model -> getAllrows();
		$my_page['url'] = '/manage/user/list/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(4,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];

        $out = array();
        $userlist = $this->user_course_model->get('','',$offset,$my_page['sub_num']);
        $userout = array();
        $rolearray = $this->config->item('role');
        foreach($userlist as $user) {
          $user['rolename'] = $rolearray[$user['role']];
          $user['lasttm'] = date('Y-m-d H:i:s', $user['lasttm']);
          $user['lastip'] = long2ip($user['lastip']);
          $userout[] = $user;
        }

		$out['my_page'] = $my_page;
        $out['user'] = $userout;
        $this->load->view('manage/user/list.html', $out);
        $this->load->view('manage/footer.html');
        break;
      case 'add':
        if($this->input->is_post()) { //post
          
        } else {
          $this->load->view('manage/user/add.html');
          $this->load->view('manage/footer.html');
        }
        break;
	  case 'add_save':
		$data['username'] = $_POST['username'];
		$data['password'] = md5($_POST['password']);
		$data['realname'] = $_POST['realname'];
		$data['email'] = $_POST['email'];
		$data['mobile'] = $_POST['mobile'];
		$data['tel'] = $_POST['tel'];
		$data['address'] = $_POST['address'];
		$data['homeaddress'] = $_POST['homeaddress'];
		$data['hometel'] = $_POST['hometel'];
		$data['linkman'] = $_POST['linkman'];
		$data['linkinfo'] = $_POST['linkinfo'];
		$data['role'] = $_POST['role'];
		$data['addtm'] = date("Y-m-d h:i:s");
		$data['lasttm'] = date("Y-m-d h:i:s");
		$data['lastip'] = ip2long($_SERVER["REMOTE_ADDR"]);
		
		$result = $this -> user_course_model -> add($data);
		break;
      case 'edit':
        if($this->input->is_post()) { //post
          
        } else {
          $this->load->view('manage/user/edit.html');
          $this->load->view('manage/footer.html');
        }
        break;
      case 'info':
        $user = $this->user_course_model->get("`id` = '$val'");
        if(isset($user[0])) {
          $user = $user[0];
          $rolearray = $this->config->item('role');
          $user['rolename'] = $rolearray[$user['role']];
          $user['addtm'] = date('Y-m-d H:i:s', $user['addtm']);
          $user['lasttm'] = date('Y-m-d H:i:s', $user['lasttm']);
          $user['lastip'] = long2ip($user['lastip']);
          $out = array();
          $out['user'] = $user;
          $this->load->view('manage/user/info.html', $out);
          $this->load->view('manage/footer.html');
        } else {
          show_404();
        }
        break;
      default:
        show_404();
        break;
    }
  }
}