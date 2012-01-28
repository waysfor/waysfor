<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainer extends CI_Controller {
	public $item;
	function __construct(){
		parent::__construct();
		$this->config->load('main');
		$this->config->load('manage');
		$this -> load -> model('base_model');
		$navarray = $this->config->item('index_nav');
		$navitem = array();
		foreach($navarray as $k=>$v) {
			$navitem[$k] = $v['item'];
		}
		
		$class['recommend'] = $this -> base_model -> get('trainer','recommend = 1','','0','10');
        $typearray = $this->config->item('type');
		foreach($class['recommend'] as $v){
			$v['trainertype'] = $typearray[$v['trainertype']];
			$trainertypeout[] = $v;
		}

		$class['recommend'] = $trainertypeout;
		
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
	
	public function index()
	{
		$class = $this->class;
		$offset = $this -> uri -> segment(3,0);
		$my_page= array();
		$my_page['sub_num'] = '25';
		$my_page['all_num'] = $this -> base_model ->get_count('trainer','1','id');
		$my_page['url'] = '/trainer/trainerlist/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(3,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
		$class['my_page'] = $my_page;
		$class['all'] = $this -> base_model ->get('trainer','','',$offset,$my_page['sub_num']);
        $typearray = $this->config->item('type');
		foreach($class['all'] as $v){
			$v['trainertype'] = $typearray[$v['trainertype']];
			$classtypeout[] = $v;
		}

		$class['all'] = $classtypeout;
		$this -> load -> model('CateModel');
		$class['cate'] = $this -> CateModel -> cate('cate');

		$header['webtitle'] = "培训讲师列表 -- 上海聚宇企业管理培训网";
		$header['nav'] = $this->_nav();
		$this->load->view('default/header', $header);
		$this->load->view('default/trainer/list/trainerlist',$class);
		$this->load->view('default/footer');
	}
	function trainerlist()
	{
		$class = $this->class;
		$offset = $this -> uri -> segment(3,0);
		$my_page= array();
		$my_page['sub_num'] = '25';
		$my_page['all_num'] = $this -> base_model ->get_count('trainer','1','id');
		$my_page['url'] = '/trainer/trainerlist/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(3,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
		$class['my_page'] = $my_page;
		$class['all'] = $this -> base_model ->get('trainer','','',$offset,$my_page['sub_num']);
        $typearray = $this->config->item('type');
		foreach($class['all'] as $v){
			$v['trainertype'] = $typearray[$v['trainertype']];
			$classtypeout[] = $v;
		}

		$class['all'] = $classtypeout;
		$this -> load -> model('CateModel');
		$class['cate'] = $this -> CateModel -> cate('cate');

		$header['webtitle'] = "培训讲师列表 -- 上海聚宇企业管理培训网";
		$header['nav'] = $this->_nav();
		$this->load->view('default/header', $header);
		$this->load->view('default/trainer/list/trainerlist',$class);
		$this->load->view('default/footer');
	}
	function trainertype($act = '',$val='0')
	{
		if(!empty($act)){
			$type_num = $act;
			$class = $this->class;
			
			$offset = $this -> uri -> segment(4,0);
			$my_page= array();
			$my_page['sub_num'] = '25';
			$my_page['all_num'] = $this -> base_model ->get_count('trainer','`trainertype` = "'.$type_num.'"','id');
			$my_page['url'] = '/trainer/trainertype/'.$type_num.'/';
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
			$class['opentype'] = $this -> base_model ->get('trainer','`trainertype` = "'.$type_num.'"','',$offset,$my_page['sub_num']);

			$header['webtitle'] = "培训讲师分类：".$class['type']." -- 上海聚宇企业管理培训网";
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/trainer/list/trainertype',$class);
			$this->load->view('default/footer');
		}else{
			$class = $this->class;
			$class['type'] = '课程分类';

			$header['webtitle'] = "培训讲师分类 -- 上海聚宇企业管理培训网";
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/trainer/list/trainertype',$class);
			$this->load->view('default/footer');
		}
	}
	function recommend($act = "",$val = ""){
		if(!empty($act)){
			$id = $act;
			$class = $this->class;
			$class['allarray'] = $this->base_model->get('trainer',"`id` = '$id'");
			$typearray = $this->config->item('type');
			if(isset($class['allarray'])){
				$class['allarray'] = $class['allarray'][0];
				$class['allarray']['trainertype'] = $typearray[$class['allarray']['trainertype']];
			}

			$header['webtitle'] = $class['allarray']['fname']."老师 -- 上海聚宇企业管理培训网";
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/trainer/show/trainerrecommend',$class);
			$this->load->view('default/footer');
		}else{
			$class = $this->class;
			
			$offset = $this -> uri -> segment(4,0);
			$my_page= array();
			$my_page['sub_num'] = '25';
			$my_page['all_num'] = $this -> base_model ->get_count('trainer','recommend = 1','id');
			$my_page['url'] = '/trainer/recommend/';
			$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
			$my_page['current_pages'] = $this -> uri -> segment(4,0)/$my_page['sub_num'] + '1';
			$my_page['previous_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
			$my_page['next_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
			$my_page['min_pages'] = '0';
			$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
			$class['my_page'] = $my_page;

			$class['recommendlist'] = $this -> base_model -> get('trainer','recommend = 1','',$offset,$my_page['sub_num']);

			$header['webtitle'] = "培训讲师推荐列表 -- 上海聚宇企业管理培训网";
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/trainer/list/trainerhot',$class);
			$this->load->view('default/footer');
		}
	}
	function show($act = "",$val ="")
	{
		if(!empty($act)){
			$id = $act;
			$class = $this->class;
			$class['allarray'] = $this->base_model->get('trainer',"`id` = '$id'");
			$typearray = $this->config->item('type');
			if(isset($class['allarray'])){
				$class['allarray'] = $class['allarray'][0];
				$class['allarray']['trainertype'] = $typearray[$class['allarray']['trainertype']];
			}

			$header['webtitle'] = $class['allarray']['fname']."老师 -- 上海聚宇企业管理培训网";
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/trainer/show/trainer',$class);
				$this->load->view('default/footer');
		}else{
			var_dump('空');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */