<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class mandor extends CI_Controller
{

 public function __construct()
   {
      parent::__construct();
      // if (!$this->session->userdata('email')) {
      //    redirect('auth/login');
      // }
      $this->load->model('M_mandor');
   }

  public function index(){
    //$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Form Daftar Mandor';
    $data['mandor'] = $this->M_mandor->Tampil_mandor();
    $this->load->view('templates/home_header', $data);
    $this->load->view('templates/home_topbar', $data);
    //$this->load->view('templates/home_sidebar', $data);
    $this->load->view('mandor/index', $data);
    $this->load->view('templates/home_footer');
  }

   public function tambah_mandor(){
	   	$data['title'] = 'Form Tambah Mandor';
	   	$data['id'] = $this->session->userdata('id');
	   	$this->form_validation->set_rules('nama_mandor', 'nama mandor', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	   	$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
	   	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

	   	 if ($this->form_validation->run() == false) {
	    $this->load->view('templates/home_header', $data);
	    $this->load->view('templates/home_topbar', $data);
	    //$this->load->view('templates/home_sidebar', $data);
	    $this->load->view('mandor/form_tambah', $data);
	    $this->load->view('templates/home_footer');
		}else{
			$data = 
			[
				'nama_mandor' => $this->input->post('nama_mandor'),
				'id_user' => $this->session->userdata('id'),
        		'alamat' => $this->input->post('alamat'),
        		'no_hp' => $this->input->post('no_hp'),
        		'deskripsi' => $this->input->post('deskripsi')
			];

			 $this->M_mandor->insert_mandor($data);
       		redirect('mandor');
		}

  }

}
