<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		if($this->session->userdata('status') == "login"){	
			$data['isi'] = $this->db->get('user');//membuka tabel user dan mengambil data tiap field dan ditampung di variabel isi
			$this->load->view('showUser' , $data);//membuka form index dan memasukkan variabel data
		}else{
			$this->load->view('login');
		}
	}

	// Add a new item
	public function add()
	{
		if($this->session->userdata('status') == "login"){	
			$this->load->view('userAdd');
		}else{
			$this->load->view('login');
		}
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
			confirm("Add User Gagal !!");;
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

		$this->db->get('user');
		$this->db->where('id', $id);
		$sukses = $this->db->update('user', $data);

		if($sukses){
			header("Location:../index");
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
			echo "Delete gagal !!";
		}

	}

	public function login(){

		$this->load->view('login');

	}

	public function loginAction(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array('username' => $username,
					'password' => $password);
		$cek = $this->M_user->cek_login('user', $where)->num_rows();
		if($cek > 0){
			$data_session = array('nama' => $username, 'status' => "login");
			$this->session->set_userdata($data_session);
			header("Location: index");
		}else{
			echo "<script>alert('There are no fields to generate a report');
			window.location.href='index';</script>";
			//redirect('User/index');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		header("Location: index");
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
