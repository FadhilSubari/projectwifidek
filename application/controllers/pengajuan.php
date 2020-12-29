<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Pengajuan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    require APPPATH . 'libraries/phpmailer/src/Exception.php';
    require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
    require APPPATH . 'libraries/phpmailer/src/SMTP.php';
  }
  public function index()
  {
    // $data['pengajuan'] = $this->m_default->get_data('pengajuan')->result();
    $data['pengajuan'] = $this->db->query('SELECT * FROM pengajuan, kategori_tempat WHERE pengajuan.id_tempat = kategori_tempat.id_tempat ORDER BY pengajuan.id_pengajuan DESC')->result();
    $this->load->view('admin/dataPengajuan', $data);
  }
  public function lihatUser($id)
  {
    $data['data_diri'] = $this->db->query("SELECT * FROM user, kecamatan, kelurahan where user.id_kelurahan = kelurahan.id_kelurahan AND user.id_kecamatan = kecamatan.id_kecamatan AND user.id_user = '$id' ORDER BY user.id_user")->row();
    $this->load->view('admin/lihatUser', $data);
  }
  public function lihat($id)
  {
    $data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
    $data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();
    $idData = ['id_pengajuan' => $id];
    $data['pengajuan'] = $this->m_default->pengajuan($idData)->row();
    $data['status'] = $this->m_default->ambilData($idData, 'status_pengajuan')->row();
    $this->load->view('admin/lihatPengajuan', $data);
  }
  public function updatePengajuan($id)
  {
    $this->form_validation->set_rules('nik', 'nik', 'required|max_length[20]');
    $this->form_validation->set_rules('nama_pengaju', 'Nama Pengaju', 'required');
    $this->form_validation->set_rules('nama_wifi', 'Nama Tempat', 'required');
    $this->form_validation->set_rules('nama_pic', 'Nama PIC', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('no_telp', 'Nomer Telepon', 'required|max_length[14]');
    $this->form_validation->set_rules('no_telp_pic', 'Nomer Telepon PIC', 'required|max_length[14]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required');
    $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');
    if ($this->form_validation->run() != false) {
      $id_pengajuan = array('id_pengajuan' => $id);
      $data = array(
        'nama_pengaju' => $this->input->post('nama_pengaju'),
        'nik' => $this->input->post('nik'),
        'nama_wifi' => $this->input->post('nama_wifi'),
        'nama_pic' => $this->input->post('nama_pic'),
        'alamat' => $this->input->post('alamat'),
        'no_telp' => $this->input->post('no_telp'),
        'no_telp_pic' => $this->input->post('no_telp_pic'),
        'email' => $this->input->post('email'),
        'id_kecamatan' => $this->input->post('id_kecamatan'),
        'id_kelurahan' => $this->input->post('id_kelurahan'),
      );
      $this->m_default->update_data($id_pengajuan, 'pengajuan', $data);
      echo "<script>alert('Update Berhasil')</script>";
      echo '<meta http-equiv="refresh" content="0;url=' . base_url('admin/lihat-pengajuan/' . $id) . '">';
    } else {
      $data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
      $data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();
      $id = ['id_pengajuan' => $id];
      $data['pengajuan'] = $this->m_default->pengajuan($id)->row();
      $data['status'] = $this->m_default->ambilData($id, 'status_pengajuan')->row();
      $this->load->view('admin/lihatPengajuan', $data);
    }
  }
  public function submitStatus()
  {
    $where = array('id_status' => $this->input->post('id_status'));
    $getData = $this->input->post('id_status');
    $data = array(
      'keterangan' => $this->input->post('keterangan'),
      'id_admin' => $this->session->userdata('id_admin'),
      'tanggal' => date('Y-m-d h:i:s'),
      'status' => $this->input->post('status'),
    );

    $statusData = $this->db->query("SELECT * FROM status_pengajuan where id_status = $getData")->row();
    $id_pengajuanData = $statusData->id_pengajuan;
    $pengajuanData = $this->db->query("SELECT * from pengajuan where id_pengajuan = '$id_pengajuanData'")->row();
    $id_userData = $pengajuanData->id_user;
    $userData = $this->db->query("SELECT * from user where id_user = '$id_userData'")->row();
    // $this->m_default->update_data($where, 'status_pengajuan', $data);
    if ($this->input->post('status') == 'Sukses Terpasang') {
      $response = false;
      $mail = new PHPMailer();
      // SMTP configuration
      $mail->isSMTP();
      $url_echo = base_url();
      $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
      $mail->SMTPAuth = true;
      $mail->Username = 'tesaplikasi0@gmail.com'; // user email
      $mail->Password = 'no808080'; // password email
      $mail->SMTPSecure = 'ssl';
      $mail->Port     = 465;

      $mail->setFrom('tesaplikasi0@gmail.com', 'Wifi Publik'); // user email
      $mail->addReplyTo($pengajuanData->email, 'fadhil'); //user email

      // Add a recipient
      $mail->addAddress($pengajuanData->email); //email tujuan pengiriman email
      $mail->addAddress($userData->email); //email tujuan pengiriman email

      // Email subject
      $mail->Subject = 'Sukses'; //subject email

      // Set email format to HTML
      $mail->isHTML(true);

      // Email body content
      $mailContent = "<h2>Selamat Wifi Publik sukses di ACC</h2>"; // isi email
      $mail->Body = $mailContent;
      // Send email
      if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
        // $data = array(
        //  'id_booking' => $id_booking,
        //  'id_user' => $id_user,
        // );

        // $this->m_perpus->insert_data($data, 'konfirmasi_pembatalan');
        echo "<script>alert('Konfirmasi Pembatalan telah telah dikirim !!')</script>";
        echo '<meta http-equiv="refresh" content="0;url=http://localhost/spaceroom/peminjaman/cetak_laporan_paket">';
      }
      //   $this->m_default->update_data($where, 'status_pengajuan', $data);
      // // $this->m_default->insert_data($data, 'status_pengajuan');
      //   $this->session->set_flashdata('submit-success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      //     Anda Berhasil Submit Status Pengajuan Wifi
      //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      //     <span aria-hidden="true">&times;</span>
      //     </button>
      //     </div>');
      //   redirect('admin/lihat-pengajuan/' . $this->input->post('id_pengajuan'));
    } elseif ($this->input->post('status') == 'Ditolak') {
      $response = false;
      $mail = new PHPMailer();
      // SMTP configuration
      $mail->isSMTP();
      $url_echo = base_url();
      $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
      $mail->SMTPAuth = true;
      $mail->Username = 'tesaplikasi0@gmail.com'; // user email
      $mail->Password = 'no808080'; // password Email
      $mail->SMTPSecure = 'ssl';
      $mail->Port     = 465;

      $mail->setFrom('tesaplikasi0@gmail.com', 'Wifi Publik'); // user email
      $mail->addReplyTo($userData->email, 'fadhil'); //user email

      // Add a recipient
      $mail->addAddress($pengajuanData->email); //email tujuan pengiriman email
      $mail->addAddress($userData->email); //email tujuan pengiriman email

      // Email subject
      $mail->Subject = 'Pengajuan Wifi Publik'; //subject email

      // Set email format to HTML
      $mail->isHTML(true);

      // Email body content
      $mailContent = "<h2>Maaf proposal yang anda kasih belum memenuhi syarat</h2>"; // isi email
      $mail->Body = $mailContent;
      // Send email
      if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
        // $data = array(
        //  'id_booking' => $id_booking,
        //  'id_user' => $id_user,
        // );

        // $this->m_perpus->insert_data($data, 'konfirmasi_pembatalan');
        // echo "<script>alert('Email Terkirim !!')</script>";
        // echo '<meta http-equiv="refresh" content="0;url=http://localhost/spaceroom/peminjaman/cetak_laporan_paket">';
      }
    }
    $this->m_default->update_data($where, 'status_pengajuan', $data);
    // $this->m_default->insert_data($data, 'status_pengajuan');
    // echo "<script>alert('$userData->email')</script>";
    $this->session->set_flashdata('submit-success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda Berhasil Submit Status Pengajuan Wifi
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('admin/lihat-pengajuan/' . $this->input->post('id_pengajuan'));
  }
}
