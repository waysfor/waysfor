<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this -> load -> model('NewsModel');
		$class['news'] = $this -> NewsModel -> news_index('news');
		
		$this -> load -> model('OpenModel');
		$class['now'] = $this -> OpenModel -> new_open('history','1');
		$class['recommend'] = $this -> OpenModel -> recommend_open('history','1');
		
		$this -> load -> model('TrainModel');
		$class['train'] = $this -> TrainModel -> train_index('history','2');
		
		$this -> load -> model('TrainerModel');
		$class['trainer'] = $this -> TrainerModel -> trainer_index('trainer');
		
		$this -> load -> model('CateModel');
		$class['cate'] = $this -> CateModel -> cate('cate');
		
		$this->load->view('default/header');
		$this->load->view('default/index',$class);
		$this->load->view('default/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */