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
		$this -> load -> model('OpenModel');
		$this -> load -> model('TrainModel');
		$class['news'] = $this -> NewsModel -> news_index('news');
		$class['now'] = $this -> OpenModel -> new_open('history','1');
		$class['recommend'] = $this -> OpenModel -> recommend_open('history','1');
		$class['train'] = $this -> TrainModel -> train_index('history','2');
		echo($class['train']);
		$this->load->view('default/header');
		$this->load->view('default/index',$class);
		$this->load->view('default/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */