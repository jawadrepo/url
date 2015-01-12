<?php 
class Welcome extends CI_Controller {

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
	 
	function __construct(){
		parent::__construct();
		$this->load->library('urllib');
	} 

	public function index(){
		
		if( isset($_GET['key']) && $_GET['key'] != ''){
			$responce = $this->urllib->getone($_GET['key']);
			header('Location: '.$responce['url']);
			
		}else if(count($_POST) > 0 &&  $_POST['url'] != ''){
			if(filter_var($_POST['url'], FILTER_VALIDATE_URL)){
				$data = $this->urllib->saveurl($_POST['url']);
				echo $data;
			}
		}else{
			$data['data'] = $this->urllib->get();
			$this->load->view('welcome_message',$data);
		}
	}
	
	public function delete(){
		if(count($_POST) > 0 &&  $_POST['unique'] != ''){
			$this->urllib->remove($_POST['unique']);
			echo $_POST['unique'];die();
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */