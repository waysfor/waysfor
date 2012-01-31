<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
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
		$class['news'] = $this -> base_model -> get('news','`source`="" AND `url`="" AND `posttime` < "'.date("Y-m-d").'"','entertime desc','0','10');
		/*分类资讯 start*/
		$class['news_type1'] = $this -> base_model -> get('news','newstype = 1','entertime desc','0','10');
		$class['news_type2'] = $this -> base_model -> get('news','newstype = 2','entertime desc','0','10');
		$class['news_type3'] = $this -> base_model -> get('news','newstype = 3','entertime desc','0','10');
		$class['news_type4'] = $this -> base_model -> get('news','newstype = 4','entertime desc','0','10');
		$class['news_type5'] = $this -> base_model -> get('news','newstype = 5','entertime desc','0','10');
		$class['news_type6'] = $this -> base_model -> get('news','newstype = 6','entertime desc','0','10');
		/*分类资讯 end*/
		
		$class['now'] = $this -> base_model -> get_classinfo('0','10');
		$cityarray = $this->config->item('city');
		$nowout = array();
		foreach($class['now'] as $v){
			$v['address'] = $cityarray[$v['address']];
			$nowout[] = $v;
		}
		$class['now'] = $nowout;

		$class['recommend'] = $this -> base_model -> get('history','status = 1 AND recommend = 1','','0','10');
		
		$class['train'] = $this -> base_model -> get('history','status = 2 AND recommend = 1','','0','10');
		
		$class['trainer'] = $this -> base_model -> get('trainer_resource','recommend = 1','','0','10');
		$typearray = $this->config->item('type');
		$trainerout = array();
		foreach($class['trainer'] as $v){
			$v['trainertype'] = $typearray[$v['trainertype']];
			$trainerout[] = $v;
		}
		$class['trainer'] = $trainerout;
		
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