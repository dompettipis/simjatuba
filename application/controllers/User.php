<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    is_logged_in();
  }
  public function index(){

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'My Profile';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit(){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Edit Profile';

    $this->form_validation->set_rules('name', 'Full name', 'required|trim');
    if ($this->form_validation->run() == false) {
      // code...
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('templates/footer');
    }else {

      $name = $this->input->post('name');
      $email = $this->input->post('email');

      //cek jika ada gambar yang diupload
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './asset/img/profile/';

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('image') ) {

          $old_image = $data['user']['image'];

          if ($old_image != 'default.jpg') {
            unlink(FCPATH . '/asset/img/profile/' . $old_image);
          }

          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);

        }else {
            echo $this->upload->display_errors();
        }
      }

      $this->db->set('name', $name);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->set_flashdata('message', '
      <div class="alert alert-success" role="alert">
        Your profile has been updated!
      </div>
      ');
      redirect('user');
    }
  }

  public function changePassword(){

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Change Password';

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

    if ($this->form_validation->run() == false) {
      // code...
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/changepassword', $data);
      $this->load->view('templates/footer');
    }else {
      $current_passowrd = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');

      if (!password_verify($current_passowrd, $data['user']['password'])) {
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
          Wrong current password!
        </div>
        ');
        redirect('user/changepassword');
      }else {
        if ($current_passowrd == $new_password) {
          $this->session->set_flashdata('message', '
          <div class="alert alert-danger" role="alert">
            New password cannot be the same as current password!
          </div>
          ');
          redirect('user/changepassword');
        }else {
          //password sudah ok
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');

          $this->session->set_flashdata('message', '
          <div class="alert alert-success" role="alert">
            Password changed!
          </div>
          ');
          redirect('user/changepassword');
        }
      }
    }
  }

// =====================================================
  // pengelolaan User
  public function read()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Data user';
    $data['semua_user'] = $this->db->get('user')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/read', $data);
    $this->load->view('templates/footer');
  }

  public function user_detail($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Detail User';

    $data['user'] = $this->db->select('*')->from('user')->join('user_role', 'user_role.id=user.role_id')->where('user.id', $id)->get()->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/user_detail', $data);
    $this->load->view('templates/footer'); 
  }

  public function user_edit($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Edit Data User';
    $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
    $data['role'] = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('name', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|trim');
    if($this->form_validation->run() == false ){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/user_edit', $data);
      $this->load->view('templates/footer'); 
    } else {
        $data = [
          'name' => $this->input->post('name'),
          'email' => $this->input->post('email'),
          'jk' => $this->input->post('jk'),
          'alamat' => $this->input->post('alamat'),
          'no_hp' => $this->input->post('no_hp'),
          'role_id' => $this->input->post('role_id')
        ];
        $this->db->update('user', $data, ['id' => $this->input->post('id')]);
        redirect('user/read', 'refresh');
    }
  }

  public function user_hapus($id)
  {
      $this->db->delete('user', ['id' => $id]);
      redirect('user/read');
  }


}


