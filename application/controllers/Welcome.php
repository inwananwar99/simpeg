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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function login()
	{
		$this->load->view('login');
	}

	public function do_login(){
		$data = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		];
		$getData = $this->ModelUser->getByUsername($data['username']);
		if($getData){
			if($getData['level'] == 1){
				if($getData['password'] == $data['password']){
					$data1 = [
						'username' => $getData['username'],
						'email' => $getData['email'],
						'level' => $getData['level'],
						'id_user' => $getData['id_user']
					];
					$this->session->set_userdata($data1);
					redirect('Welcome/dashboard/1');
				}else{
					echo 'Password tidak sesuai';
				}
			}else if($getData['level'] == 2){
				if($getData['password'] == $data['password']){
					$data2 = [
						'username' => $getData['username'],
						'email' => $getData['email'],
						'level' => $getData['level'],
						'id_user' => $getData['id_user']
					];
					$this->session->set_userdata($data2);
					redirect('Welcome/dashboard/2');
				}else{
					echo 'Password tidak sesuai';
				}
			}else if($getData['level'] == 3){
				if($getData['password'] == $data['password']){
					$data3 = [
						'username' => $getData['username'],
						'email' => $getData['email'],
						'level' => $getData['level'],
						'id_user' => $getData['id_user']
					];
					$this->session->set_userdata($data3);
					redirect('Welcome/dashboard/3');
				}else{
					echo 'Password tidak sesuai';
				}
			}else if($getData['level'] == 4){
				if($getData['password'] == $data['password']){
					$data4 = [
						'username' => $getData['username'],
						'email' => $getData['email'],
						'level' => $getData['level'],
						'id_user' => $getData['id_user']
					];
					$this->session->set_userdata($data4);
					redirect('Welcome/dashboard/4');
				}else{
					echo 'Password tidak sesuai';
				}
			}
		}else{
			echo 'user belum terdaftar';
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Welcome/login');
	}

	public function dashboard($level){
		if($level == 1){
			$data = ['konten' => 'admin/dashboard'];
			return $this->load->view('template',$data);
		}else if($level == 2){
			$data = ['konten' => 'pendidikan/dashboard1'];
			return $this->load->view('pendidikan/template',$data);
		}else if($level == 3){
			$data = ['konten' => 'pendidikan/dashboard2'];
			return $this->load->view('pendidikan/template',$data);
		}else if($level == 4){
			$data = ['konten' => 'direktur/dashboard'];
			return $this->load->view('direktur/template',$data);
		}
	}
}
