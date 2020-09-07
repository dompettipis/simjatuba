<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
  }


  public function index(){

    if ($this->session->userdata('email')) {
      redirect('user');
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false ) {
      $data['title'] = 'Login Page';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
  }else {
    $this->_login();
  }
  }

  private function _login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    //lakukan query menggunakan query builder CI
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //jika usernya ada
    if ($user) {
      //jika usernya aktif
      if ($user['is_active'] == 1) {
        // cek password nya
        if ( password_verify($password, $user['password']) ) {
          $data = [
            'email' => $user['email'],
            'is_active' => $user['is_active'],
            'role_id' => $user['role_id'],
            'id' => $user['id']
          ];

          $this->session->set_userdata($data);
          if ( $user['role_id'] == 1 ) {

            redirect('admin');
          }elseif($user['role_id'] == 2){
            redirect('home');
          }else {
            redirect('user');
          }

        }else {
          $this->session->set_flashdata('message', '
          <div class="alert alert-danger" role="alert">
            Password wrong!</div>');
            redirect('auth');
        }
      }else {
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
        This email has been not activated!
        </div>');
          redirect('auth');
      }
    }else {
      $this->session->set_flashdata('message', '
      <div class="alert alert-danger" role="alert">
        Email is not Registered!</div>');
        redirect('auth');
    }

  }

  public function registration(){
    if ($this->session->userdata('email')) {
      redirect('user');
    }

    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This Email has Already Registerd!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
      'matches' => 'Password dont match!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'User Registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    }else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];

      $this->db->insert('user', $data);

      // $this->_sendEmail();

      $this->session->set_flashdata('message', '
      <div class="alert alert-success" role="alert">
        <strong>Conratulation!</strong> your email account has been created. Please Login
      </div>
      ');

      redirect('auth');

    }

  }

  private function _sendEmail(){

    $config = [
      'protocol'  => 'smtp',
      'smtp_hots' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'oart939@gmail.com',
      'smtp_pass' => 'download7',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);


    $this->email->from('oart939@gmail.com', 'Web Programing');
    $this->email->to('ilhamart3@gmail.com');
    $this->email->subject('testing');
    $this->email->message('hello word!');

    if ($this->email->send()) {
      return true;
    }else {
      echo $this->email->print_debugger();
      die;
    }


  }

public function logout(){
  $this->session->unset_userdata('email');
  $this->session->unset_userdata('role_id');

  $this->session->set_flashdata('message', '
  <div class="alert alert-success" role="alert">
    You have been logged out!
  </div>
  ');
  redirect('home');
}

public function blocked(){
  $this->load->view('blocked');
}







}
