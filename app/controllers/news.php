<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	public $item;
	function __construct(){
		parent::__construct();
		$this -> load -> model('base_model');
		$this->config->load('main');
		$this->config->load('manage');
		$navarray = $this->config->item('index_nav');
		$navitem = array();
		foreach($navarray as $k=>$v) {
			$navitem[$k] = $v['item'];
		}
		
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
	function index(){
		$class = $this->class;
		$offset = $this -> uri -> segment(3,0);
		$my_page= array();
		$my_page['sub_num'] = '25';
		$my_page['all_num'] = $this -> base_model ->get_count('news','`posttime` < "'.date("Y-m-d").'"','id');
		$my_page['url'] = '/news/newslist/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(3,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
		$class['my_page'] = $my_page;
		$class['all'] = $this->base_model->get('news','`posttime` < "'.date("Y-m-d").'"');
		$typearray = $this->config->item('type');
		$classtypeout = array();
		foreach($class['all'] as $v){
			if($v['newstype'] == ''){
				$v['newstype'] = '0';
			}
			$v['newstype'] = $typearray[$v['newstype']];
			$classtypeout[] = $v;
		}
		$class['all'] = $classtypeout;

		$header['webtitle'] = "培训资讯 -- 上海聚宇企业管理培训网";
		$header['nav'] = $this->_nav();
		$this->load->view('default/header', $header);
		$this->load->view('default/news/list/newslist',$class);
		$this->load->view('default/footer');
	}
	function newslist(){
		$class = $this->class;
		$offset = $this -> uri -> segment(3,0);
		$my_page= array();
		$my_page['sub_num'] = '25';
		$my_page['all_num'] = $this -> base_model ->get_count('news','`posttime` < "'.date("Y-m-d").'"','id');
		$my_page['url'] = '/news/newslist/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(3,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
		$class['my_page'] = $my_page;
		$class['all'] = $this->base_model->get('news','`posttime` < "'.date("Y-m-d").'"');
		$typearray = $this->config->item('type');
		$classtypeout = array();
		foreach($class['all'] as $v){
			if($v['newstype'] == ''){
				$v['newstype'] = '0';
			}
			$v['newstype'] = $typearray[$v['newstype']];
			$classtypeout[] = $v;
		}
		$class['all'] = $classtypeout;

		$header['webtitle'] = "培训资讯 -- 上海聚宇企业管理培训网";
		$header['nav'] = $this->_nav();
		$this->load->view('default/header', $header);
		$this->load->view('default/news/list/newslist',$class);
		$this->load->view('default/footer');
	}
	function my_news(){
		$class = $this->class;
		$offset = $this -> uri -> segment(3,0);
		$my_page= array();
		$my_page['sub_num'] = '25';
		$my_page['all_num'] = $this -> base_model ->get_count('news','`source`="" AND `url`="" AND `posttime` < "'.date("Y-m-d").'"','id');
		$my_page['url'] = '/news/newslist/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(3,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
		$class['my_page'] = $my_page;
		$class['all'] = $this->base_model->get('news','`source`="" AND `url`="" AND `posttime` < "'.date("Y-m-d").'"');
		$typearray = $this->config->item('type');
		$classtypeout = array();
		foreach($class['all'] as $v){
			if($v['newstype'] == ''){
				$v['newstype'] = '0';
			}
			$v['newstype'] = $typearray[$v['newstype']];
			$classtypeout[] = $v;
		}
		$class['all'] = $classtypeout;

		$header['webtitle'] = "公司新闻 -- 上海聚宇企业管理培训网";
		$header['nav'] = $this->_nav();
		$this->load->view('default/header', $header);
		$this->load->view('default/news/list/my_newslist',$class);
		$this->load->view('default/footer');
	}
	function oth_news(){
		$class = $this->class;
		$offset = $this -> uri -> segment(3,0);
		$my_page= array();
		$my_page['sub_num'] = '25';
		$my_page['all_num'] = $this -> base_model ->get_count('news','(`source`!="" or `url`!="") AND `posttime` < "'.date("Y-m-d").'"','id');
		$my_page['url'] = '/news/newslist/';
		$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
		$my_page['current_pages'] = $this -> uri -> segment(3,0)/$my_page['sub_num'] + '1';
		$my_page['previous_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
		$my_page['next_pages'] = (floor($this -> uri -> segment(3,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
		$my_page['min_pages'] = '0';
		$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
		$class['my_page'] = $my_page;
		$class['all'] = $this->base_model->get('news','(`source`!="" AND `url`!="") AND `posttime` < "'.date("Y-m-d").'"');
		$typearray = $this->config->item('type');
		$classtypeout = array();
		foreach($class['all'] as $v){
			if($v['newstype'] == ''){
				$v['newstype'] = '0';
			}
			$v['newstype'] = $typearray[$v['newstype']];
			$classtypeout[] = $v;
		}
		$class['all'] = $classtypeout;

		$header['webtitle'] = "行业资讯 -- 上海聚宇企业管理培训网";
		$header['nav'] = $this->_nav();
		$this->load->view('default/header', $header);
		$this->load->view('default/news/list/oth_newslist',$class);
		$this->load->view('default/footer');
	}
	function newstype($act = '', $val =''){
		$class = $this->class;
		if(!empty($act)){
			$type_num = $act;
			$offset = $this -> uri -> segment(4,0);
			$my_page= array();
			$my_page['sub_num'] = '25';
			$my_page['all_num'] = $this -> base_model ->get_count('news','`newstype` = "'.$type_num.'" AND `posttime` < "'.date("Y-m-d").'"','id');
			$my_page['url'] = '/news/newstype/'.$type_num.'/';
			$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
			$my_page['current_pages'] = $this -> uri -> segment(4,0)/$my_page['sub_num'] + '1';
			$my_page['previous_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])-1)*$my_page['sub_num'];
			$my_page['next_pages'] = (floor($this -> uri -> segment(4,0)/$my_page['sub_num'])+1)*$my_page['sub_num'];
			$my_page['min_pages'] = '0';
			$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
			$class['my_page'] = $my_page;

			$class['all'] = $this->base_model->get('news','`newstype` = "'.$type_num.'" AND `posttime` < "'.date("Y-m-d").'"');
			$typearray = $this->config->item('type');
			$class['type'] = $header['type'] = $typearray[$type_num];
			$classtypeout = array();
			foreach($class['all'] as $v){
				if($v['newstype'] == ''){
					$v['newstype'] = '0';
				}
				$v['newstype'] = $typearray[$v['newstype']];
				$classtypeout[] = $v;
			}
			$class['all'] = $classtypeout;

			$header['webtitle'] = "培训资讯分类:".$header['type']." -- 上海聚宇企业管理培训网";
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/news/list/newstype',$class);
			$this->load->view('default/footer');
		}else{
			$class['type'] = '资讯分类';
			$header['webtitle'] = "培训资讯分类列表 -- 上海聚宇企业管理培训网";
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/news/list/newstype',$class);
			$this->load->view('default/footer');
		}
	}
	function show($act='',$val=''){
		$class = $this->class;
		if(!empty($act)){
			$id = $act;
			$class['all'] = $this->base_model->get('news',"`id` = '$id' AND `posttime` < '".date('Y-m-d')."'");
			if(!empty($class['all'])){
			if(isset($class['all'][0])) {
				$class['all'] = $class['all'][0];
				$class['showall'] = $class['all'];
			}

			$header['webtitle'] = $class['all']['title']." -- 上海聚宇企业管理培训网";
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/news/show/show',$class);
			$this->load->view('default/footer');
			} else {
				echo('很抱歉，你所查看的内容不存在');
			}
		} else {
			echo('很抱歉，你所查看的内容不存在');
		}
	}
}