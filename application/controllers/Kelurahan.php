<?php

class Kelurahan extends Ci_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('roles') != 'master' || $this->session->userdata('roles') != 'master') {
      redirect('admin');
    }
  }
  public function index()
  {
    $data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
    $this->load->view('admin/dataKelurahan', $data);
  }
  public function addKelurahan()
  {
    $this->load->view('admin/tambahKelurahan');
  }
  public function prosesAddKelurahan()
  {
    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
    if ($this->form_validation->run() != false) {
      $data = array(
        'nama_kelurahan' => $this->input->post('kelurahan')
      );
      $this->m_default->insert_data($data, 'kelurahan');
      redirect('admin/data-kelurahan');
    } else {
      $this->load->view('admin/tambahkelurahan');
    }
  }
  public function editKelurahan($id)
  {
    $dimana = array('id_kelurahan' => $id);
    $data['kelurahan'] = $this->m_default->ambilData($dimana, 'kelurahan')->row();
    $this->load->view('admin/editkelurahan', $data);
  }
  public function prosesEditKelurahan()
  {
    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
    if ($this->form_validation->run() != false) {
      $where = array('id_kelurahan' => $this->input->post('id_kelurahan'));
      $data = array(
        'nama_kelurahan' => $this->input->post('kelurahan')
      );
      $this->m_default->update_data($where, 'kelurahan', $data);
      redirect('admin/data-kelurahan');
    } else {
      $this->load->view('admin/editkelurahan');
    }
  }
  public function dataUser()
  {
    $data['item'] = $this->db->query('SELECT * FROM user, kelurahan, kecamatan where user.id_kelurahan = kelurahan.id_kelurahan AND user.id_kecamatan = kecamatan.id_kecamatan')->result();
    $this->load->view('admin/dataUser',$data);
  }
  public function dataAdmin()
  {
    $data['item'] = $this->db->query('SELECT * FROM admin')->result();
    $this->load->view('admin/dataAdmin',$data);
  }
  public function tambahAdmin()
  {
    $this->load->view('admin/tambahAdmin');
  }
  public function prosesTambahAdmin()
  {
    $this->form_validation->set_rules('nama_admin', 'nama_admin', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
    if ($this->form_validation->run() != false)
    {
      $data = array(
        'nama_admin' => $this->input->post('nama_admin'),
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password')),
        'no_telp' => $this->input->post('no_telp'),
        'roles' => 'normal'
      );
      $this->m_default->insert_data($data, 'admin');
      echo "<script>alert('Admin berhasil ditambah')</script>";
      echo '<meta http-equiv="refresh" content="0;url=' . base_url('admin/data-admin') . '">';
    }

  }
}
