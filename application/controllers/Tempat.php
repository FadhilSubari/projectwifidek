<?php

class Tempat extends CI_Controller
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
    $data['tempat'] = $this->m_default->get_data('kategori_tempat')->result();
    $this->load->view('admin/dataTempat', $data);
  }
  public function addTempat()
  {
    $this->load->view('admin/tambahTempat');
  }
  public function prosesAddTempat()
  {
    $this->form_validation->set_rules('tempat', 'Tempat', 'required');

    if ($this->form_validation->run() != false) {
      $data = array(
        'nama_tempat' => $this->input->post('tempat')
      );
      $this->m_default->insert_data($data, 'kategori_tempat');
      redirect('admin/data-tempat');
    } else {
      $this->load->view('admin/tambahTempat');
    }
  }
  public function editTempat($id)
  {
    $dimana = array('id_tempat' => $id);
    $data['tempat'] = $this->m_default->ambilData($dimana, 'kategori_tempat')->row();
    $this->load->view('admin/editTempat', $data);
  }
  public function prosesEditTempat()
  {
    $this->form_validation->set_rules('tempat', 'tempat', 'required');
    if ($this->form_validation->run() != false) {
      $where = array('id_tempat' => $this->input->post('id_tempat'));
      $data = array(
        'nama_tempat' => $this->input->post('tempat')
      );
      $this->m_default->update_data($where, 'kategori_tempat', $data);
      redirect('admin/data-tempat');
    } else {
      $this->load->view('admin/editTempat');
    }
  }
}
