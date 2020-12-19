<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Welcome extends CI_Controller
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
		$data['pengajuan'] = $this->db->query('SELECT * FROM pengajuan, status_pengajuan where pengajuan.id_pengajuan = status_pengajuan.id_pengajuan AND status_pengajuan.status = "Sukses Terpasang" order by pengajuan.id_pengajuan DESC')->result();
		$this->load->view('user/index',$data);
	}
	public function profile()
	{
		$this->load->view('user/profile');
	}
	public function manualBook()
	{
		$this->load->view('user/manualBook');
	}
	public function login()
	{
		if (!empty($this->session->userdata('id_user'))) {
			redirect('/');
		}
		$this->load->view('user/login');
	}
	public function loginProses()
	{
		if (!empty($this->session->userdata('id_user'))) {
			redirect('/');
		}
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() != false) {
			$where = array('email' => $email, 'password' => md5($password));
			$dataUser = $this->m_default->ambilData($where, 'user');
			$dataSession = $dataUser->row();
			$dapatUser = $dataUser->num_rows();
			if ($dapatUser > 0) {
				$session = array(
					'nama' => $dataSession->nama, 'id_user' => $dataSession->id_user
				);
				$this->session->set_userdata($session);
				redirect('/');
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Uppss!</strong> Password atau Email yang Anda Masukkan Salah!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				$this->session->set_flashdata('email', $email);
				redirect(base_url('user/login'));
			}
		} else {
			$this->load->view('user/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('user/login'));
	}

	public function register()
	{
		$data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
		$data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();

		$this->load->view('user/register', $data);
	}

	public function lupaPass()
	{
		$this->load->view('user/lupaPass');
	}
	public function resetPass()
	{
		$email = $this->input->post('email');
		$where = array('email' => $this->input->post('email'));
		$pass = array('password' => md5($this->input->post('email')));
		$emailReset = $this->m_default->ambilData($where,'user')->num_rows();
		if($emailReset == 0)
		{
			echo "<script>alert('Email tidak terdaftar')</script>";
			echo '<meta http-equiv="refresh" content="0;url=' . base_url() . '">';
		}
		else
		{
			$this->m_default->update_data($where, 'user', $pass);

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
      $mail->addAddress($email); //email tujuan pengiriman email

                    // Email subject
      $mail->Subject = 'Lupa Password'; //subject email

                    // Set email format to HTML
      $mail->isHTML(true);

                    // Email body content
      $mailContent = "<h2>Anda Telah mereset Password dengan email $email</h2>
      <table border='1' cellpadding='10'>
      <tr>
      <td style='background-color: #636e72;'>Email</td>
      <td style='background-color: #636e72;'>Password</td>
      </tr>
      <tr>
      <td>$email</td>
      <td>$email</td>
      </tr>
      </table>"; // isi email
      $mail->Body = $mailContent;
                    // Send email
      if(!$mail->send()){
      	echo 'Message could not be sent.';
      	echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
      	// $data = array(
      	// 	'id_booking' => $id_booking,
      	// 	'id_user' => $id_user,
      	// );

      	// $this->m_perpus->insert_data($data, 'konfirmasi_pembatalan');
      	echo "<script>alert('Konfirmasi Pembatalan telah telah dikirim !!')</script>";
      	echo '<meta http-equiv="refresh" content="0;url=http://localhost/spaceroom/peminjaman/cetak_laporan_paket">';
      }
    }
  }

  public function registerProses()
  {
  	$data['kelurahan'] = $this->m_default->get_data('kelurahan')->result();
  	$data['kecamatan'] = $this->m_default->get_data('kecamatan')->result();
  	$this->form_validation->set_rules('nama', 'Nama', 'required');
  	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
  	$this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'required');
  	$this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');
  	$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
  	$this->form_validation->set_rules('email', 'Email', 'required');
  	$this->form_validation->set_rules('password', 'Password', 'required');
  	if ($this->form_validation->run() != false) {
  		$config['upload_path'] = './assets/upload/user/';
  		$config['allowed_types'] = 'jpg|png|jpeg';
  		$config['max_size'] = '2048';
  		$config['file_name'] = 'foto' . time();

  		$this->load->library('upload', $config);

  		if ($this->upload->do_upload('foto')) {
  			$image = $this->upload->data();
  			$data = array(
  				'id_user' => $this->m_default->kode_otomatis(),
  				'nama' => $this->input->post('nama'),
  				'alamat' => $this->input->post('alamat'),
  				'id_kelurahan' => $this->input->post('id_kelurahan'),
  				'id_kecamatan' => $this->input->post('id_kecamatan'),
  				'kode_pos' => $this->input->post('kode_pos'),
  				'email' => $this->input->post('email'),
  				'password' => md5($this->input->post('password')),
  				'foto' => $image['file_name'],
  			);
  			$this->m_default->insert_data($data, 'user');
  			redirect('user/login');
  		} else {
  			echo "<script>alert('gagal upload foto')</script>";
  		}
  	} else {
  		$this->load->view('user/register', $data);
  	}
  }
}
