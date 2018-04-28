<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$data['isi'] = $this->db->get('user');//membuka tabel user dan mengambil data tiap field dan ditampung di variabel isi
		$this->load->view('showUser' , $data);//membuka form index dan memasukkan variabel data
	}

	// Add a new item
	public function add()
	{
		$this->load->view('userAdd');
	}

	public function addAction()
	{
		# code...
		$data = array('username' => $this->input->post('username'),
					 'password' => $this->input->post('password'),
					 'fullname' => $this->input->post('fullname'),
					 'level' => $this->input->post('level'));

		$sukses = $this->db->insert('user' , $data);
		if($sukses){
			header("Location:../User/index");
		}else{
			echo "gagal";
		}
	}
	//Update one item
	public function update( $id = '' )
	{
		$this->db->where('id',$id);
		$data['isi'] = $this->db->get('user');

		$this->load->view('update',$data);
	}

	//Update Action
	public function updateAction( $id = '' ){
		$data = array('username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'fullname' => $this->input->post('fullname'),
					'level' => $this->input->post('level'));

		$this->db->where('id', $id);
		$sukses = $this->db->update('user', $data);

		if($sukses){
			header("Location:../User/index");
		}else{
			echo "Gagal Update !!";
		}
	}

	//Delete one item
	public function delete( $id = '')
	{

		$this->db->where('id',$id);

		$delete = $this->db->delete('user');

		if($delete){
			header("Location:../index");
		}else{
			echo "Delete gagal bego !!";
		}

	}

	public function login(){

		$this->load->view('user');

	}

	public function loginAction(){
		$this->db->get('id',$id);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
