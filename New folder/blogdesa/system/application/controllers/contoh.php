<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Contoh class
 *
 * @package default
 * @author Ibnu Daqiqil Id
 **/
 
class Contoh extends Controller 
{
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
	}
 
	/**
	 * Index function
	 *
	 * @return void
	 * @author Ibnu Daqiqil Id
	 **/	
	function index()
	{
		$this->load->library('breadcrumb');
		$this->breadcrumb->add('Pages','pages')->add('Management','pages/manage')->add('Add new Page','pages/manage/add');
		$this->load->view('crumb');
	}
 
}
 
// END  Contoh class
 
/* End of file contoh.php */
/* Location: /Applications/XAMPP/xamppfiles/htdocs/multishop/application/controllers/contoh.php  */