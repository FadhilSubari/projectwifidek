<?php

class Dashboard extends Ci_Controller
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
    $data['kecamatan'] = $this->db->query('SELECT * FROM kategori_tempat')->result();
    $dataa = $this->db->query('SELECT * FROM kategori_tempat')->result();
    $this->load->view('admin/index', $data);
  }
  public function logout()
  {
    $this->session->sess_destroy();

    redirect('admin');
  }
  public function kecamatan()
  {
    $data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();
    $this->load->view('admin/dataKecamatan', $data);
  }
  public function addKecamatan()
  {
    $this->load->view('admin/tambahKecamatan');
  }
  public function prosesAddKecamatan()
  {
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    if ($this->form_validation->run() != false) {
      $data = array(
        'nama_kecamatan' => $this->input->post('kecamatan')
      );
      $this->m_default->insert_data($data, 'kecamatan');
      redirect('admin/data-kecamatan');
    } else {
      $this->load->view('admin/tambahKecamatan');
    }
  }
  public function editKecamatan($id)
  {
    $dimana = array('id_kecamatan' => $id);
    $data['kecamatan'] = $this->m_default->ambilData($dimana, 'kecamatan')->row();
    $this->load->view('admin/editKecamatan', $data);
  }
  public function prosesEditKecamatan()
  {
    $dimana = array('id_kecamatan' => $this->input->post('id_kecamatan'));
    $data['kecamatan'] = $this->m_default->ambilData($dimana, 'kecamatan')->row();
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    if ($this->form_validation->run() != false) {
      $where = array('id_kecamatan' => $this->input->post('id_kecamatan'));
      $data = array(
        'nama_kecamatan' => $this->input->post('kecamatan')
      );
      $this->m_default->update_data($where, 'kecamatan', $data);
      redirect('admin/data-kecamatan');
    } else {
      $this->load->view('admin/editKecamatan', $data);
    }
  }
}
