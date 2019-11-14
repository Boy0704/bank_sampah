<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_sampah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_sampah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_sampah/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_sampah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_sampah/index.html';
            $config['first_url'] = base_url() . 'jenis_sampah/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_sampah_model->total_rows($q);
        $jenis_sampah = $this->Jenis_sampah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_sampah_data' => $jenis_sampah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'jenis_sampah/jenis_sampah_list',
            'judul' => 'Jenis Sampah',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_sampah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis' => $row->id_jenis,
		'jenis_sampah' => $row->jenis_sampah,
	    );
            $this->load->view('jenis_sampah/jenis_sampah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_sampah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_sampah/create_action'),
	    'id_jenis' => set_value('id_jenis'),
	    'jenis_sampah' => set_value('jenis_sampah'),
        'konten' => 'jenis_sampah/jenis_sampah_form',
            'judul' => 'Jenis Sampah',
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
		'jenis_sampah' => $this->input->post('jenis_sampah',TRUE),
	    );

            $this->Jenis_sampah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_sampah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_sampah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_sampah/update_action'),
		'id_jenis' => set_value('id_jenis', $row->id_jenis),
		'jenis_sampah' => set_value('jenis_sampah', $row->jenis_sampah),
        'konten' => 'jenis_sampah/jenis_sampah_form',
            'judul' => 'Jenis Sampah',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_sampah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis', TRUE));
        } else {
            $data = array(
		'jenis_sampah' => $this->input->post('jenis_sampah',TRUE),
	    );

            $this->Jenis_sampah_model->update($this->input->post('id_jenis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_sampah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_sampah_model->get_by_id($id);

        if ($row) {
            $this->Jenis_sampah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_sampah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_sampah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_sampah', 'jenis sampah', 'trim|required');

	$this->form_validation->set_rules('id_jenis', 'id_jenis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_sampah.php */
/* Location: ./application/controllers/Jenis_sampah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-16 19:13:53 */
/* http://harviacode.com */