<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        $this->load->library('pagination');
    }
	

	public function pengelola()
	{
		$data = array(
			'konten' => 'pengelola',
			'judul' => 'Data Pengelola',
		);
		$this->load->view('v_index',$data);
	}

	public function persentase_keuntungan()
	{
		if ($_POST != NULL) {
			$data = array(
				'konten' => 'persentase_keuntungan',
				'judul' => 'Data Persentase Keuntungan',
				'nasabah' => $this->input->post('nasabah'),
				'pengelola' => $this->input->post('pengelola'),
			);
			$this->load->view('v_index',$data);
		} else {
			$data = array(
				'konten' => 'persentase_keuntungan',
				'judul' => 'Data Persentase Keuntungan',
				'nasabah' => 60,
				'pengelola' => 40,
			);
			$this->load->view('v_index',$data);
		}
	}

	public function index()
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login','refresh');
		}
		$data = array(
			'konten' => 'v_home',
			'judul' => 'Dashboard',
		);
		$this->load->view('v_index',$data);
	}

	public function detail_tabungan($id_anggota)
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login','refresh');
		}
		$data = array(
			'konten' => 'detail_tabungan',
			'judul' => 'Detail Tabungan',
		);
		$this->load->view('v_index',$data);
	}



	function cekharga_beli($id)
	{
		echo ambil_field_tabel('sampah','id_sampah',$id,'harga_beli');
	}

	function cekharga_jual($id)
	{
		echo ambil_field_tabel('sampah','id_sampah',$id,'harga_jual');
	}

	public function tabungan()
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login','refresh');
		}
		$data = array(
			'konten' => 'tabungan',
			'judul' => 'Tabungan',
		);
		$this->load->view('v_index',$data);
	}

	public function tarik_tabungan()
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login_nasabah','refresh');
		}

		if ($_POST == NULL) {
			$data = array(
				'konten' => 'tarik_tabungan',
				'judul' => 'Tabungan',
			);
			$this->load->view('v_index',$data);
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$id_user = $_POST['id_anggota'];
			$penarikan = $_POST['penarikan'];

			$data = array(
				'id_anggota'=>$id_user,
				'tanggal'=>date('Y-m-d H:i:s'),
				'jumlah'=>$penarikan
			);

			// $sisa = ambil_field_tabel('tabungan','id_user',$id_user,'tabungan') - $penarikan;
			// $this->db->where('id_user',$id_user);
			// $this->db->update('tabungan',array('tabungan'=>$sisa));
			$this->db->insert('penarikan', $data);

			?>
			<script>
				alert('Penarikan Tabungan Berhasil');
				window.location="<?php echo base_url('app/tarik_tabungan') ?>";
			</script>
			<?php
		}
	}

	public function tabungan_nasabah($id_user)
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login_nasabah','refresh');
		}

		$data = array(
			'konten' => 'tabungan_nasabah',
			'judul' => 'Tabungan',
		);
		$this->load->view('v_index',$data);
	}

	public function sampah()
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login_nasabah','refresh');
		}

		$data = array(
			'konten' => 'sampah',
			'judul' => 'Data Sampah',
		);
		$this->load->view('v_index',$data);
	}


	public function cetak_laporan()
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login','refresh');
		}
		$data = array(
				'konten' => 'cetak_laporan',
				'judul' => 'Cetak Filter',
			);
			$this->load->view('v_index',$data);
	}

	

	public function lap_nasabah()
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login','refresh');
		}
		$this->load->view('cetak_nasabah');
	}

	public function lap_tabungan($id_anggota)
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login','refresh');
		}
		$this->load->view('cetak_tabungan');
	}

	public function lap_sampah()
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login','refresh');
		}
		$this->load->view('cetak_sampah');
	}

	public function lap_pembelian()
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login','refresh');
		}
		$this->load->view('cetak_pembelian');
	}

	public function lap_penjualan()
	{
		if ($this->session->userdata('level') == NULL && $this->session->userdata('username') == NULL) {
			redirect('app/login','refresh');
		}
		$this->load->view('cetak_penjualan');
	}


	public function login()
	{
		if ($_POST == NULL) {
			$this->load->view('v_login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek_user = $this->db->query("SELECT * FROM users WHERE username='$username' and password='$password' ");
			if ($cek_user->num_rows() == 1) {
				foreach ($cek_user->result() as $row) {
					$sess_data['id_user'] = $row->id_user;
					$sess_data['nama'] = $row->nama_user;
					$sess_data['username'] = $row->username;
					$sess_data['foto'] = $row->foto_user;
					$sess_data['level'] = $row->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('app/index');
			} else {
				?>
				<script type="text/javascript">
					alert('Username dan password kamu salah !');
					window.location="<?php echo base_url('app/login'); ?>";
				</script>
				<?php
			}
		}
	}

	public function login_nasabah()
	{
		if ($_POST == NULL) {
			$this->load->view('login_nasabah');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek_user = $this->db->query("SELECT * FROM anggota WHERE username='$username' and password='$password' ");
			if ($cek_user->num_rows() == 1) {
				foreach ($cek_user->result() as $row) {
					$sess_data['id_user'] = $row->id_anggota;
					$sess_data['nama'] = $row->nama_anggota;
					$sess_data['username'] = $row->username;
					$sess_data['foto'] = 'nasabah_image.png';
					$sess_data['level'] = $row->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('app/index');
			} else {
				?>
				<script type="text/javascript">
					alert('Username dan password kamu salah !');
					window.location="<?php echo base_url('app/login_nasabah'); ?>";
				</script>
				<?php
			}
		}
	}

	function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('foto');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('app');
	}

}
