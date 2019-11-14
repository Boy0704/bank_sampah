<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penjualan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penjualan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penjualan/index.html';
            $config['first_url'] = base_url() . 'penjualan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penjualan_model->total_rows($q);
        $penjualan = $this->Penjualan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penjualan_data' => $penjualan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'penjualan/penjualan_list',
            'judul' => 'Penjualan Sampah',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penjualan' => $row->id_penjualan,
		'id_sampah' => $row->id_sampah,
		'tanggal' => $row->tanggal,
		'berat' => $row->berat,
		'total' => $row->total,
		'petugas' => $row->petugas,
	    );
            $this->load->view('penjualan/penjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penjualan/create_action'),
	    'id_penjualan' => set_value('id_penjualan'),
	    'id_sampah' => set_value('id_sampah'),
	    'tanggal' => set_value('tanggal'),
	    'berat' => set_value('berat'),
	    'total' => set_value('total'),
	    'petugas' => set_value('petugas'),
        'konten' => 'penjualan/penjualan_form',
            'judul' => 'Penjualan Sampah',
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
		'id_sampah' => $this->input->post('id_sampah',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'berat' => $this->input->post('berat',TRUE),
		'total' => $this->input->post('total',TRUE),
		'petugas' => $this->input->post('petugas',TRUE),
	    );

            $this->Penjualan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penjualan/update_action'),
		'id_penjualan' => set_value('id_penjualan', $row->id_penjualan),
		'id_sampah' => set_value('id_sampah', $row->id_sampah),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'berat' => set_value('berat', $row->berat),
		'total' => set_value('total', $row->total),
		'petugas' => set_value('petugas', $row->petugas),
        'konten' => 'penjualan/penjualan_form',
            'judul' => 'Penjualan Sampah',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penjualan', TRUE));
        } else {
            $data = array(
		'id_sampah' => $this->input->post('id_sampah',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'berat' => $this->input->post('berat',TRUE),
		'total' => $this->input->post('total',TRUE),
		'petugas' => $this->input->post('petugas',TRUE),
	    );

            $this->Penjualan_model->update($this->input->post('id_penjualan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $this->Penjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_sampah', 'id sampah', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('berat', 'berat', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');
	$this->form_validation->set_rules('petugas', 'petugas', 'trim|required');

	$this->form_validation->set_rules('id_penjualan', 'id_penjualan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-16 19:14:01 */
/* http://harviacode.com */