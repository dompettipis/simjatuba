<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function index(){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Halaman Utama';
    $data['tukang'] = $this->db->get_where('user', ['role_id' => 3])->result_array();

    $this->load->view('templates/home_header', $data);
    $this->load->view('templates/home_topbar', $data);
    $this->load->view('templates/home_sidebar', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/home_footer');
  }

  public function profile(){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Profile';
    $data['jk'] = ['Laki-laki', 'Perempuan'];
    $data['tukang'] = $this->db->get_where('user', ['role_id' => 3])->result_array();

    $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', ['required' => 'Tinggalkan Pesan Terlebih Dahulu']);
    if ( $this->form_validation->run() == false ) {
      // code...
      $this->load->view('templates/home_header', $data);
      $this->load->view('templates/home_topbar', $data);
      //$this->load->view('templates/home_sidebar', $data);
      $this->load->view('home/profile', $data);
      $this->load->view('templates/home_footer');
    }else {
      // $data = [
      //   "id_pelanggan" =>
      // ];

      $this->db->insert('pesanan', $pesan);
      $this->session->set_flashdata('message', '
      <div class="alert alert-success" role="alert">
      Pesanan berhasil ditambahkan!
      </div>');
        redirect('home');
    }
  }

  public function pesanan(){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Pemesanan';
    $this->db->select('*');
    $this->db->from('pesanan');
    $this->db->join('user', 'user.id_pelanggan = pesanan.id_pelanggan');
    $this->db->where('pesanan.id_pelanggan', 'P01');
    $data['pesanan'] = $this->db->get()->result_array();



    $this->load->view('templates/home_header', $data);
    $this->load->view('templates/home_topbar', $data);
    //$this->load->view('templates/home_sidebar', $data);
    $this->load->view('home/pesanan', $data);
    $this->load->view('templates/home_footer');

  }

  public function tentang(){
     $data['title'] = 'Pemesanan';

    $this->load->view('templates/home_header', $data);
    $this->load->view('templates/home_topbar', $data);
    $this->load->view('home/tentang', $data);
    $this->load->view('templates/home_footer');
  }
}
