<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    is_logged_in();
  }
  public function index(){

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Dashboard';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function role(){

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Role';

    $data['role'] = $this->db->get('user_role')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer');
  }

  public function roleAccess($role_id){

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Role Access';

    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();


    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('user_menu')->result_array();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('templates/footer');
  }

  public function changeAccess(){
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1 ) {
      $this->db->insert('user_access_menu', $data);
    }else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '
    <div class="alert alert-success" role="alert">
      Access changed!
    </div>
    ');
  }

  public function pelanggan(){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Data Pelanggan';

    $data['pelanggan'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/pelanggan', $data);
    $this->load->view('templates/footer');
  }

  public function mandor(){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Data Mandor';
    $data['jk'] = ['Laki-laki', 'Perempuan'];

    $data['mandor'] = $this->db->get_where('mandor')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/mandor', $data);
    $this->load->view('templates/footer');
  }

  public function mandor_detail($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Detail Mandor';

    $data['mandor'] = $this->db->get_where('mandor', ['id_mandor' => $id])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('mandor/detail', $data);
    $this->load->view('templates/footer'); 
  }

  public function mandor_edit($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Edit Data Mandor';
    $data['mandor'] = $this->db->get_where('mandor', ['id_mandor' => $id])->row_array();

    $this->form_validation->set_rules('nama_mandor', 'Nama Mandor', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|trim');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
    if($this->form_validation->run() == false ){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('mandor/edit', $data);
      $this->load->view('templates/footer'); 
    } else {
        $data = [
          'nama_mandor' => $this->input->post('nama_mandor'),
          'alamat' => $this->input->post('alamat'),
          'no_hp' => $this->input->post('no_hp'),
          'deskripsi' => $this->input->post('deskripsi'),
        ];
        $this->db->update('mandor', $data, ['id_mandor' => $id]);
        redirect('admin/mandor', 'refresh');
    }
  }

  public function mandor_hapus($id)
  {
      $this->db->delete('mandor', ['id_mandor' => $id]);
      redirect('admin/mandor');
  }

}


