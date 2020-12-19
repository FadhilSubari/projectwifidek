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
}
