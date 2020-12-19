<?php

class Pengajuan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    // $data['pengajuan'] = $this->m_default->get_data('pengajuan')->result();
    $data['pengajuan'] = $this->db->query('SELECT * FROM pengajuan, kategori_tempat WHERE pengajuan.id_tempat = kategori_tempat.id_tempat ORDER BY pengajuan.id_pengajuan DESC')->result();
    $this->load->view('admin/dataPengajuan', $data);
  }
  public function lihat($id)
  {
    $id = ['id_pengajuan' => $id];
    $data['pengajuan'] = $this->m_default->pengajuan($id)->row();
    $data['status'] = $this->m_default->ambilData($id, 'status_pengajuan')->row();
    $this->load->view('admin/lihatPengajuan', $data);
  }
  public function submitStatus()
  {
    $where = array('id_status' => $this->input->post('id_status'));
    $data = array(
      'keterangan' => $this->input->post('keterangan'),
      'id_admin' => $this->session->userdata('id_admin'),
      'tanggal' => date('Y-m-d h:i:s'),
      'status' => $this->input->post('status'),
    );
    $this->m_default->update_data($where, 'status_pengajuan', $data);
    // $this->m_default->insert_data($data, 'status_pengajuan');
    $this->session->set_flashdata('submit-success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Anda Berhasil Submit Status Pengajuan Wifi
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');
    redirect('admin/lihat-pengajuan/' . $this->input->post('id_pengajuan'));
  }
}
