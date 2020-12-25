<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Pengajuan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    require APPPATH.'libraries/phpmailer/src/Exception.php';
    require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
    require APPPATH.'libraries/phpmailer/src/SMTP.php';
  }
  public function index()
  {
    // $data['pengajuan'] = $this->m_default->get_data('pengajuan')->result();
    $data['pengajuan'] = $this->db->query('SELECT * FROM pengajuan, kategori_tempat WHERE pengajuan.id_tempat = kategori_tempat.id_tempat ORDER BY pengajuan.id_pengajuan DESC')->result();
    $this->load->view('admin/dataPengajuan', $data);
  }
  public function lihat($id)
  {
    $data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
    $data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();
    $id = ['id_pengajuan' => $id];
    $data['pengajuan'] = $this->m_default->pengajuan($id)->row();
    $data['status'] = $this->m_default->ambilData($id, 'status_pengajuan')->row();
    $this->load->view('admin/lihatPengajuan', $data);
  }
  public function updatePengajuan($id)
  {
    $id_pengajuan = array('id_pengajuan' => $id);
    $data = array(
      'nama_pengaju' => $this->input->post('nama_pengaju'),
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
    // $this->m_default->update_data($where, 'status_pengajuan', $data);
    if($this->input->post('status') == 'Sukses Terpasang')
    {
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

      $mail->setFrom('tesaplikasi0@gmail.com', 'Konfrimasi Lupas Password'); // user email
      $mail->addReplyTo($email, 'fadhil'); //user email

                    // Add a recipient
      $mail->addAddress('nurfadhilsubari@gmail.com'); //email tujuan pengiriman email

                    // Email subject
      $mail->Subject = 'Sukses'; //subject email

                    // Set email format to HTML
      $mail->isHTML(true);

                    // Email body content
      $mailContent = "<h2>Selamat Wifi Publik sukses di ACC</h2>
      <table border='1' cellpadding='10'>
      <tr>
      <td style='background-color: #636e72;'>Email</td>
      <td style='background-color: #636e72;'>Password</td>
      </tr>
      <tr>
      <td></td>
      <td></td>
      </tr>
      </table>"; // isi email
      $mail->Body = $mailContent;
                    // Send email
      if(!$mail->send()){
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
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
    }
    if($this->input->post('status') == 'Ditolak')
    {
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

      $mail->setFrom('tesaplikasi0@gmail.com', 'Konfrimasi Lupas Password'); // user email
      $mail->addReplyTo($email, 'fadhil'); //user email

                    // Add a recipient
      $mail->addAddress('nurfadhilsubari@gmail.com'); //email tujuan pengiriman email

                    // Email subject
      $mail->Subject = 'Pengajuan Wifi Publik'; //subject email

                    // Set email format to HTML
      $mail->isHTML(true);

                    // Email body content
      $mailContent = "<h2>Maaf proposal yang anda kasih belum memenuhi syarat</h2>
      <table border='1' cellpadding='10'>
      <tr>
      <td style='background-color: #636e72;'>Email</td>
      <td style='background-color: #636e72;'>Password</td>
      </tr>
      <tr>
      <td></td>
      <td></td>
      </tr>
      </table>"; // isi email
      $mail->Body = $mailContent;
                    // Send email
      if(!$mail->send()){
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
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
    $this->session->set_flashdata('submit-success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda Berhasil Submit Status Pengajuan Wifi
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>');
    redirect('admin/lihat-pengajuan/' . $this->input->post('id_pengajuan'));
  }
}