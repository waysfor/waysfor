<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Train extends CI_Controller {
	public $item;
	function __construct(){
		parent::__construct();
		$this -> load -> model('base_model');
		$this -> load -> helper('url');
		$this->config->load('main');
		$navarray = $this->config->item('index_nav');
		$navitem = array();
		foreach($navarray as $k=>$v) {
			$navitem[$k] = $v['item'];
		}
		$this->_header();
		
		$class['recommend'] = $this -> base_model -> get('history','`status` = 2 AND recommend = 1','','0','10');
		
		$this -> load -> model('CateModel');
		$class['cate'] = $this -> CateModel -> cate('cate');
		$this->class = $class;
	}
	private function _nav() {
		$nav = $this->config->item('index_nav');
		//开始按照seq排序处理
		$navlist = array();
		foreach($nav as $v) {
			$navlist[$v['seq']] = $v;
		}
		ksort($navlist);
		$out['nav']  = $navlist;
		$out['item'] = $this->item;
		//$out['act']  = $this->act;
		return $this->load->view('default/nav', $out, true);
	}
	private function _header() {
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
	}
	
	function index(){
		header("Location: /train/trainlist/0");
	}
	
	function trainlist(){
		$class = $this->class;
		$offset = $this -> uri -> segment(3,0);
		$my_page= array();
		$my_page['sub_num'] = '25';
		$my_page['all_num'] = $this -> base_model ->get_count('history','`status` = 2','id');
		$my_page['url'] = '/train/trainlist/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(3,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
		$class['my_page'] = $my_page;
		$class['all'] = $this -> base_model ->get('history','`status`=2','',$offset,$my_page['sub_num']);
		$this->load->view('default/train/list/trainlist',$class);
		$this->load->view('default/footer');
	}

	function show($act = '', $val = 0)
	{
		if(!empty($act)){
			$id = $act;
			$class = $this->class;
			$class['allarray'] = $this->base_model->get('history',"`id` = '$id'");
			if(isset($class['allarray'][0])) {
				$class['allarray'] = $class['allarray'][0];
				$class['showall'] = $class['allarray'];

			}
			$this->load->view('default/train/show/show',$class);
			$this->load->view('default/footer');
		}else{
			var_dump('空');
		}
	}
	function classtype($act = '', $val = 0)
	{
		if(!empty($act)){
			$type_num = $act;
			$class = $this->class;
			
			$offset = $this -> uri -> segment(4,0);
			$my_page= array();
			$my_page['sub_num'] = '25';
			$my_page['all_num'] = $this -> base_model ->get_count('history','`status` = 2 AND `classtype` = "'.$type_num.'"','id');
			$my_page['url'] = '/train/classtype/'.$type_num.'/';
			$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
			$my_page['current_pages'] = $this -> uri -> segment(4,0)/$my_page['sub_num'] + '1';
			$my_page['previous_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
			$my_page['next_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
			$my_page['min_pages'] = '0';
			$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
			$class['my_page'] = $my_page;

			$this->config->load('manage');
			$typearray = $this->config->item('type');
			$class['type'] = $typearray[$type_num];
			$class['opentype'] = $this -> base_model ->get('history','`status` = 2 AND `classtype` = "'.$type_num.'"','',$offset,$my_page['sub_num']);
			$this->load->view('default/train/list/traintype',$class);
			$this->load->view('default/footer');
		}else{
			$class = $this->class;
			$class['type'] = '课程分类';
			$this->load->view('default/train/list/traintype',$class);
			$this->load->view('default/footer');
		}
	}
	function recommend($act = '', $val = 0)
	{
		if(!empty($act)){
			$id = $act;
			$class = $this->class;
			$class['hotarray'] = $this->base_model->get('history',"`id` = '$id'");
			if(isset($class['hotarray'][0])) {
				$class['hotarray'] = $class['hotarray'][0];
				$class['showhot'] = $class['hotarray'];

			}
			$this->load->view('default/train/show/showrecommend',$class);
			$this->load->view('default/footer');
		}else{
			$class = $this->class;
			
			$offset = $this -> uri -> segment(4,0);
			$my_page= array();
			$my_page['sub_num'] = '25';
			$my_page['all_num'] = $this -> base_model ->get_count('history','`status`=2 AND recommend = 1','id');
			$my_page['url'] = '/train/recommend/';
			$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
			$my_page['current_pages'] = $this -> uri -> segment(4,0)/$my_page['sub_num'] + '1';
			$my_page['previous_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
			$my_page['next_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
			$my_page['min_pages'] = '0';
			$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
			$class['my_page'] = $my_page;

			$class['hotlist'] = $this -> base_model -> get('history','`status` = 2 AND `recommend` = 1','',$offset,$my_page['sub_num']);
			$this->load->view('default/train/list/trainrecommend',$class);
			$this->load->view('default/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */