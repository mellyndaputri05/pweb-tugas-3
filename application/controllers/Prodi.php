<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdiModel');
        $this->load->model('FakultasModel');
    }

    public function index()
    {
        $data['title']  = 'Program Studi';
        $data['prodi']  = $this->ProdiModel->getAll();

        $this->load->view('layout/header', $data);
        $this->load->view('prodi/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('prodi_id',     'ID Prodi',       'required|numeric|is_unique[prodi.prodi_id]');
        $this->form_validation->set_rules('prodi_name',   'Nama Prodi',     'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('prodi_strata', 'Strata',         'required');
        $this->form_validation->set_rules('fakultas_id',  'Fakultas',       'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['title']    = 'Tambah Program Studi';
            $data['action']   = base_url('prodi/tambah');
            $data['button']   = 'Simpan';
            $data['prodi']    = null;
            $data['fakultas'] = $this->FakultasModel->getAll();

            $this->load->view('layout/header', $data);
            $this->load->view('prodi/form', $data);
            $this->load->view('layout/footer');
        } else {
            $insert_data = [
                'prodi_id'     => $this->input->post('prodi_id'),
                'prodi_name'   => $this->input->post('prodi_name'),
                'prodi_strata' => $this->input->post('prodi_strata'),
                'fakultas_id'  => $this->input->post('fakultas_id'),
            ];

            $this->ProdiModel->insert($insert_data);

            $this->session->set_flashdata('swal', [
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data Program Studi berhasil ditambahkan.'
            ]);
            redirect('prodi');
        }
    }

    public function ubah($id)
    {
        $prodi = $this->ProdiModel->getById($id);
        if (!$prodi) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data prodi tidak ditemukan.'
            ]);
            redirect('prodi');
        }

        $this->form_validation->set_rules('prodi_name',   'Nama Prodi', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('prodi_strata', 'Strata',     'required');
        $this->form_validation->set_rules('fakultas_id',  'Fakultas',   'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['title']    = 'Update Program Studi';
            $data['action']   = base_url('prodi/ubah/' . $id);
            $data['button']   = 'Update';
            $data['prodi']    = $prodi;
            $data['fakultas'] = $this->FakultasModel->getAll();

            $this->load->view('layout/header', $data);
            $this->load->view('prodi/form', $data);
            $this->load->view('layout/footer');
        } else {
            $update_data = [
                'prodi_name'   => $this->input->post('prodi_name'),
                'prodi_strata' => $this->input->post('prodi_strata'),
                'fakultas_id'  => $this->input->post('fakultas_id'),
            ];

            $this->ProdiModel->update($id, $update_data);

            $this->session->set_flashdata('swal', [
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data Program Studi berhasil diperbarui.'
            ]);
            redirect('prodi');
        }
    }

    public function hapus($id)
    {
        $prodi = $this->ProdiModel->getById($id);
        if (!$prodi) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data tidak ditemukan.'
            ]);
            redirect('prodi');
        }

        $this->ProdiModel->delete($id);

        $this->session->set_flashdata('swal', [
            'icon'  => 'success',
            'title' => 'Berhasil!',
            'text'  => 'Data Program Studi berhasil dihapus.'
        ]);
        redirect('prodi');
    }
}