<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
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
		$this -> load -> model('NewsModel');
		$class['news'] = $this -> NewsModel -> news_index('news');
		/*分类资讯 start*/
		$class['news_type1'] = $this -> NewsModel -> news_tpye('news','1');
		$class['news_type2'] = $this -> NewsModel -> news_tpye('news','2');
		$class['news_type3'] = $this -> NewsModel -> news_tpye('news','3');
		$class['news_type4'] = $this -> NewsModel -> news_tpye('news','4');
		$class['news_type5'] = $this -> NewsModel -> news_tpye('news','5');
		$class['news_type6'] = $this -> NewsModel -> news_tpye('news','6');
		/*分类资讯 end*/
		
		$this -> load -> model('OpenModel');
		$class['now'] = $this -> OpenModel -> new_open('history','1');
		$class['recommend'] = $this -> OpenModel -> recommend_open('history','1');
		
		$this -> load -> model('TrainModel');
		$class['train'] = $this -> TrainModel -> train_index('history','2');
		
		$this -> load -> model('TrainerModel');
		$class['trainer'] = $this -> TrainerModel -> trainer_index('trainer');
		
		$this -> load -> model('CateModel');
		$class['cate'] = $this -> CateModel -> cate('cate');
		
		$this->load->view('default/index',$class);
		$this->load->view('default/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */