<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public $item;
	function __construct(){
		parent::__construct();
		$this -> load -> model('base_model');
		$this->config->load('main');
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
		$class['news'] = $this -> base_model -> get('news','1','entertime desc','0','10');
		/*分类资讯 start*/
		$class['news_type1'] = $this -> base_model -> get('news','newstype = 1','entertime desc','0','10');
		$class['news_type2'] = $this -> base_model -> get('news','newstype = 2','entertime desc','0','10');
		$class['news_type3'] = $this -> base_model -> get('news','newstype = 3','entertime desc','0','10');
		$class['news_type4'] = $this -> base_model -> get('news','newstype = 4','entertime desc','0','10');
		$class['news_type5'] = $this -> base_model -> get('news','newstype = 5','entertime desc','0','10');
		$class['news_type6'] = $this -> base_model -> get('news','newstype = 6','entertime desc','0','10');
		/*分类资讯 end*/
		
		$class['now'] = $this -> base_model -> get_time('classinfo','>','nid,opentime,cid', '0', '10');
		$class['recommend'] = $this -> base_model -> get('history','status = 1 AND recommend = 1','','0','10');
		
		$class['train'] = $this -> base_model -> get('history','status = 2 AND recommend = 1','','0','10');
		
		$class['trainer'] = $this -> base_model -> get('trainer','recommend = 1','','0','10');
		
		$class['cate'] = $this -> base_model -> get('cate');

		$header['webtitle']='上海聚宇企业管理培训网 -- beta 2.0';
		$header['nav'] = $this->_nav();
		$this->load->view('default/header', $header);
		$this->load->view('default/index',$class);
		$this->load->view('default/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */