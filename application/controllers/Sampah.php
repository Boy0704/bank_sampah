<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sampah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sampah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sampah/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sampah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sampah/index.html';
            $config['first_url'] = base_url() . 'sampah/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sampah_model->total_rows($q);
        $sampah = $this->Sampah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sampah_data' => $sampah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'sampah/sampah_list',
            'judul' => 'Data Sampah',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Sampah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sampah' => $row->id_sampah,
		'nama_sampah' => $row->nama_sampah,
		'id_jenis' => $row->id_jenis,
		'harga_beli' => $row->harga_beli,
		'harga_jual' => $row->harga_jual,
		'stok' => $row->stok,
	    );
            $this->load->view('sampah/sampah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sampah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sampah/create_action'),
	    'id_sampah' => set_value('id_sampah'),
	    'nama_sampah' => set_value('nama_sampah'),
	    'id_jenis' => set_value('id_jenis'),
	    'harga_beli' => set_value('harga_beli'),
	    'harga_jual' => set_value('harga_jual'),
	    'stok' => set_value('stok'),
        'konten' => 'sampah/sampah_form',
            'judul' => 'Data Sampah',
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_sampah' => $this->input->post('nama_sampah',TRUE),
		'id_jenis' => $this->input->post('id_jenis',TRUE),
		'harga_beli' => $this->input->post('harga_beli',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Sampah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sampah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sampah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sampah/update_action'),
		'id_sampah' => set_value('id_sampah', $row->id_sampah),
		'nama_sampah' => set_value('nama_sampah', $row->nama_sampah),
		'id_jenis' => set_value('id_jenis', $row->id_jenis),
		'harga_beli' => set_value('harga_beli', $row->harga_beli),
		'harga_jual' => set_value('harga_jual', $row->harga_jual),
		'stok' => set_value('stok', $row->stok),
        'konten' => 'sampah/sampah_form',
            'judul' => 'Data Sampah',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sampah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sampah', TRUE));
        } else {
            $data = array(
		'nama_sampah' => $this->input->post('nama_sampah',TRUE),
		'id_jenis' => $this->input->post('id_jenis',TRUE),
		'harga_beli' => $this->input->post('harga_beli',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Sampah_model->update($this->input->post('id_sampah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sampah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sampah_model->get_by_id($id);

        if ($row) {
            $this->Sampah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sampah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sampah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_sampah', 'nama sampah', 'trim|required');
	$this->form_validation->set_rules('id_jenis', 'id jenis', 'trim|required');
	$this->form_validation->set_rules('harga_beli', 'harga beli', 'trim|required');
	$this->form_validation->set_rules('harga_jual', 'harga jual', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');

	$this->form_validation->set_rules('id_sampah', 'id_sampah', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sampah.php */
/* Location: ./application/controllers/Sampah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-16 19:14:05 */
/* http://harviacode.com */