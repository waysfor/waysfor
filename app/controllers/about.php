<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	public $item;
	function __construct(){
		parent::__construct();
		$this -> load -> model('base_model');
		$this->config->load('main');
		$this->config->load('manage');
		$this->config->load('city');
		$navarray = $this->config->item('index_nav');
		$navitem = array();
		foreach($navarray as $k=>$v) {
			$navitem[$k] = $v['item'];
		}
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
		$header['webtitle']='关于我们 -- 上海聚宇企业管理培训网';
		$header['nav'] = $this->_nav();
		$this->load->view('default/header', $header);
		$this->load->view('default/about/about');
		$this->load->view('default/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */