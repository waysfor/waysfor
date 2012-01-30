<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	public $item;
	function __construct(){
		parent::__construct();
		$this -> load -> model('base_model');
		$this -> load -> helper('url');
		$this->config->load('main');
		$this->config->load('manage');
		$this->config->load('city');
		$class['statusarray'] = $this->config->item('status');
		$class['typearray'] = $this->config->item('type');
		$class['cityarray'] = $this->config->item('city');
		$navarray = $this->config->item('index_nav');
		$navitem = array();
		foreach($navarray as $k=>$v) {
			$navitem[$k] = $v['item'];
		}
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
		$data = $this->input->get();
		if($data){
			$key = $header['key'] = $data['txt'];
			$channel = $class['channel'] = $data['channel'];
			$per_page = $data['per_page'];
			if($channel == '公开课' or $channel == '企业内训'){
				$table_name = " history ";
				if($channel == '公开课'){
					$where = " `status` = 1 AND `classname` like '%".$key."%' ";
				} else {
					$where = " `status` = 2 AND `classname` like '%".$key."%' ";
				}
			} elseif($channel == '课程资源'){
				$table_name = " history ";
				$where = " classname like '%".$key."%' ";
			}
			$my_page= array();
			$my_page['sub_num'] = '25';
			$my_page['all_num'] = $this -> base_model ->get_count($table_name,$where,'id');
			$my_page['url'] = '/search/?txt='.$data['txt'].'&channel='.$data['channel'].'&per_page=';
			$my_page['pages'] = ceil($my_page['all_num']/$my_page['sub_num']);
			$my_page['current_pages'] = $per_page/$my_page['sub_num'] + '1';
			$my_page['previous_pages'] = (floor($per_page/$my_page['sub_num'])-1)*$my_page['sub_num'];
			$my_page['next_pages'] = (floor($per_page/$my_page['sub_num'])+1)*$my_page['sub_num'];
			$my_page['min_pages'] = '0';
			$my_page['max_pages'] = floor($my_page['all_num']/$my_page['sub_num'])*$my_page['sub_num'];
			$class['my_page'] = $my_page;
			$class['all'] = $this->base_model->get($table_name,$where,'',$per_page,$my_page['sub_num']);

			$header['webtitle']='搜索字：'.$key.' -- 上海聚宇企业管理培训网';
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/search/list',$class);
		} else {
			$header['webtitle']='搜索 -- 上海聚宇企业管理培训网';
			$header['nav'] = $this->_nav();
			$this->load->view('default/header', $header);
			$this->load->view('default/search/search',$class);
		}
		$this->load->view('default/footer');
	}
	function result()
	{
		$class = $this->class;
		$this->load->view('default/search/inc/result',$class);
		$this->load->view('default/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */