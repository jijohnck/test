<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function login(){
		$uname=$this->input->post('uname');
		$psw=$this->input->post('psw');
		$data = array('username' =>$uname , 'password' => $psw);
		$this->load->model('modl1');
		$query=$this->modl1->login($data);
		$rows1 = $query->result();
        if($query->num_rows()){
        	if($rows1[0]->position =='admin'){
        		$data1=$this->modl1->shop_mall();
        		$this->load->view('admin',$data1);
        	}
        }
        else{
                redirect('/welcome');
        }
		
	}
	public function del_mall(){
		$id=$this->input->post('id');
		$this->load->model('modl1');
		$query=$this->modl1->mal_del($id);
	}
	public function del_shop(){
		$id=$this->input->post('id');
		$this->load->model('modl1');
		$query=$this->modl1->shop_del($id);
	}
	public function mall_add(){
		$mall_name=$this->input->post('mallname');
		$this->load->model('modl1');
		$query=$this->modl1->mall_ad($mall_name);
	}
	public function shop_add(){
		$shop_name=$this->input->post('shopname');
		$mall_id=$this->input->post('mall_id');
		 $data = array(
                        'sname' => $shop_name,
                        'maill_id' => $mall_id
                );
		$this->load->model('modl1');
		$query=$this->modl1->shop_ad($data);
	}
}
