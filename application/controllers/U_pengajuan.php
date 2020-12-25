<?php

class U_pengajuan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('id_user'))) {
      redirect('user/login');
    }
  }
  public function index()
  {
    $idLogin = $this->session->userdata('id_user');
    $getData = $this->db->query("SELECT * FROM pengajuan, status_pengajuan WHERE pengajuan.id_pengajuan = status_pengajuan.id_pengajuan AND pengajuan.id_user = '$idLogin' AND status_pengajuan.status = 'Sukses Terpasang'")->num_rows();

    if($getData == 0)
    {
      $data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();
      $data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
      $data['tempat'] = $this->m_default->get_data('kategori_tempat')->result();
      $this->load->view('user/formPengajuan', $data);
    }else{
      echo "<script>alert('Akun ini sudah memiliki proposal yang sudah di setujui, 1 akun hanya bisa menerima 1 keberhasilan mengajukan Wifi publik')</script>";
      echo '<meta http-equiv="refresh" content="0;url=' . base_url() . '">';
    }
  }
  public function prosesDaftar()
  {
    $this->load->library('upload');
    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('nama_pengaju', 'Nama Pengaju', 'required');
    $this->form_validation->set_rules('nama_wifi', 'Nama Tempat', 'required');
    $this->form_validation->set_rules('nama_pic', 'Nama Pic', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('no_telp', 'Nomer Telepon', 'required');
    $this->form_validation->set_rules('no_telp_pic', 'Nomer Telepon Pic', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');

    if ($this->form_validation->run() != false) {
      $config['upload_path'] = './assets/upload/proposal/';
      $config['allowed_types'] = 'pdf|word';
      $config['max_size'] = '2048';
      $config['file_name'] = 'proposal' . time();

      $this->upload->initialize($config);

      // $this->load->library('upload', $config);
      if ($this->upload->do_upload('proposal')) {

        $image = $this->upload->data();
        unset($config);

        $config['upload_path'] = './assets/upload/KTP/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = 'foto_ktp' . time();

        $this->upload->initialize($config);

      // $this->load->library('upload', $config2);
        if($this->upload->do_upload('foto_ktp')) {
          $image2 = $this->upload->data();
          $data = array(
            'id_pengajuan' => $this->m_default->kode_otomatis_pengajuan(),
            'nik' => $this->input->post('nik'),
            'nama_pengaju' => $this->input->post('nama_pengaju'),
            'nama_pic' => $this->input->post('nama_pic'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'id_user' => $this->session->userdata('id_user'),
            'no_telp_pic' => $this->input->post('no_telp_pic'),
            'email' => $this->input->post('email'),
            'id_kecamatan' => $this->input->post('id_kecamatan'),
            'id_kelurahan' => $this->input->post('id_kelurahan'),
            'id_tempat' => $this->input->post('id_tempat'),
            'tanggal' => date('Y-m-d h:i:s'),
            'proposal' => $image['file_name'],
            'foto_ktp' => $image2['file_name'],
            'nama_wifi' => $this->input->post('nama_wifi'),
          );
          $this->m_default->insert_data($data, 'pengajuan');
          $status_id = $this->db->query('SELECT * FROM pengajuan order by id_pengajuan desc limit 1')->row(); 
          $data = array(
            'id_pengajuan' => $status_id->id_pengajuan,
            'keterangan' => '',
            'id_admin' => '',
            'status' => 'Menunggu Seleksi',
            'tanggal' => date('Y-m-d h:i:s'),
          );
          $this->m_default->insert_data($data, 'status_pengajuan');
          redirect('/');
        }else {
          echo "<script>alert('ktp gagal di upload')</script>";
        }
      } else {
        echo "<script>alert('Proposal gagal di upload')</script>";
      }
    } else {
      $data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();
      $data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
      $data['tempat'] = $this->m_default->get_data('kategori_tempat')->result();
      $this->load->view('user/formPengajuan', $data);
    }
  }
  public function dataPengajuan()
  {
    $item = ['id_user' => $this->session->userdata('id_user')];
    $data['pengajuan'] = $this->m_default->ambilData($item, 'pengajuan')->result();
    print_r($item);
    $this->load->view('user/dataPengajuan', $data);
  }
  public function lihat($id)
  {
    $id = ['id_pengajuan' => $id];
    $data['pengajuan'] = $this->m_default->pengajuan($id)->row();
    $data['status'] = $this->m_default->ambilData($id, 'status_pengajuan')->row();
    $this->load->view('user/lihatPengajuan', $data);
  }  
  public function cetak($id)
  {
    $id = ['id_pengajuan' => $id];
    $data['pengajuan'] = $this->m_default->pengajuan($id)->row();
    $data['status'] = $this->m_default->ambilData($id, 'status_pengajuan')->row();
    $this->load->view('user/cetak', $data);
  }

  public function dataDiri()
  {
    $data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
    $data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();
    $id_login = $this->session->userdata('id_user');
    $data['data_diri'] = $this->db->query("SELECT * FROM user, kelurahan, kecamatan where user.id_kelurahan = kelurahan.id_kelurahan AND user.id_kecamatan = kecamatan.id_kecamatan AND user.id_user = $id_login")->row();
    $this->load->view('user/dataDiri', $data);
  }
  public function updateDataDiri()
  {
    $data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
    $data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required');
    $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');

    $id_user = ['id_user' => $this->session->userdata('id_user')];
    if($this->form_validation->run() != false)
    {
      $config['upload_path'] = './assets/upload/user/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_size'] = '2048';
      $config['file_name'] = 'foto' . time();

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $image = $this->upload->data();
        $data = array(
          'nama' => $this->input->post('nama'),
          'alamat' => $this->input->post('alamat'),
          'id_kelurahan' => $this->input->post('id_kelurahan'),
          'id_kecamatan' => $this->input->post('id_kecamatan'),
          'kode_pos' => $this->input->post('kode_pos'),
          'email' => $this->input->post('email'),
          'no_telp' => $this->input->post('no_telp'),
          'foto' => $image['file_name']
        );
        $this->m_default->update_data($id_user, 'user', $data);
            echo "<script>alert('Data diri berhasil di ubah')</script>";
      echo '<meta http-equiv="refresh" content="0;url=' . base_url('user/data-diri') . '">';
      }else{
        $data = array(
          'nama' => $this->input->post('nama'),
          'alamat' => $this->input->post('alamat'),
          'id_kelurahan' => $this->input->post('id_kelurahan'),
          'id_kecamatan' => $this->input->post('id_kecamatan'),
          'kode_pos' => $this->input->post('kode_pos'),
          'email' => $this->input->post('email'),
          'no_telp' => $this->input->post('no_telp')
        );
        $this->m_default->update_data($id_user, 'user', $data);
      echo "<script>alert('Data diri berhasil di ubah')</script>";
      echo '<meta http-equiv="refresh" content="0;url=' . base_url('user/data-diri') . '">';
      }
    }
  }

  public function gantiPassword()
  {
    $this->load->view('user/gantiPassword');
  }
  public function prosesGantiPassword()
  {
    $id_user = ['id_user' => $this->session->userdata('id_user')];
    $this->form_validation->set_rules('password', 'password', 'required');
    if($this->form_validation->run() != false)
    {
    $data = array(
      'password' => md5($this->input->post('password'))
    );
    $this->m_default->update_data($id_user, 'user', $data);
    $this->session->sess_destroy();
    echo "<script>alert('Ganti Password Berhasil')</script>";
    echo '<meta http-equiv="refresh" content="0;url=' . base_url('user/login') . '">';
    }
  }
}
