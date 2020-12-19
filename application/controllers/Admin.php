<?php

class Admin extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!empty($this->session->userdata('roles'))) {
      redirect('admin/dashboard');
    }
  }

  public function index()
  {
    $this->load->view('admin/login');
  }

  public function loginProses()
  {
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() != false) {
      $dimana = array('email' => $this->input->post('email'), 'password' => md5($this->input->post('password')));
      $getRow = $this->m_default->ambilData($dimana, 'admin');
      $dataAdmin = $getRow->row();
      $dataAda = $getRow->num_rows();

      if ($dataAda > 0) {
        $session = array(
          'id_admin' => $dataAdmin->id_admin,
          'nama' => $dataAdmin->nama_admin,
          'roles' => $dataAdmin->roles
        );
        $this->session->set_userdata($session);
        redirect('admin/dashboard');
      } else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Uppss!</strong> Password atau Email yang Anda Masukkan Salah!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
        redirect('admin');
      }
    }
    $this->load->view('admin');
  }
}
