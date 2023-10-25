<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller JenisObatController
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class JenisObatController extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('username')){
      redirect('auth/login');
    }
    $this->load->model('Jenis_model');
    $this->load->library('form_validation');
    
  }

  public function index()
  {
    $data['jenis'] = $this->Jenis_model->getAllJenis();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('jenis_obat/index',$data); 
    $this->load->view('template/footer');
  }

  public function tambah()
  {
    $this->form_validation->set_rules('nama_jenis_obat','Nama Jenis Obat','required');
    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('jenis_obat/tambah'); 
      $this->load->view('template/footer');
      $this->session->set_flashdata('failed', 'Mohon Isi Field Diatas');
    }else{
        $this->Jenis_model->TambahDataJenis();
        $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
        redirect('jenisobatcontroller');
    }
  }

  public function edit($id)
  {
    $data['jenis'] = $this->Jenis_model->getJenisById($id);
    $this->form_validation->set_rules('nama_jenis_obat','Nama Jenis Obat','required');
    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('jenis_obat/edit',$data); 
      $this->load->view('template/footer');
      $this->session->set_flashdata('failed', 'Mohon Isi Field Diatas');
    }else{
        $this->Jenis_model->UbahDataJenis();
        $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('jenisobatcontroller');
    }
  }

  public function hapus($id){
    $this->Jenis_model->HapusDataJenis($id);
    $this->session->set_flashdata('flash', 'Berhasil Dihapus');
    redirect ('jenisobatcontroller');
}
}


/* End of file JenisObatController.php */
/* Location: ./application/controllers/JenisObatController.php */