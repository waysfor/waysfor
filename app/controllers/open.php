<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Open extends CI_Controller {
	public $item;
	function __construct(){
		parent::__construct();
		$this->config->load('main');
		$navarray = $this->config->item('index_nav');
		$navitem = array();
		foreach($navarray as $k=>$v) {
			$navitem[$k] = $v['item'];
		}
		$this->_header();
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
	
	public function index()
	{
		$this -> load -> model('OpenModel');
		$class['now'] = $this -> OpenModel -> new_open('history','1');
		$class['recommend'] = $this -> OpenModel -> recommend_open('history','1');
		$class['old'] = $this -> OpenModel -> old_open('history','1');
		
		$this -> load -> model('CateModel');
		$class['cate'] = $this -> CateModel -> cate('cate');
		
		$this->load->view('default/list/openlist',$class);
		$this->load->view('default/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */