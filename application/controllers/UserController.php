<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller UserController
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

class UserController extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('username')){
      redirect('auth/login');
    }
    $this->load->model('User_model');
    $this->load->library('form_validation');

  }

  public function index()
  {
    $data['user'] = $this->User_model->getAllUser();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('user/index',$data); 
    $this->load->view('template/footer');
  }

  public function tambah()
  {
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('fullname','Fullname','required');
    $this->form_validation->set_rules('is_active','Is Active','required');
    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('user/tambah'); 
      $this->load->view('template/footer');
      $this->session->set_flashdata('failed', 'Mohon Isi Field Diatas');
    }else{
        $this->User_model->TambahDataUser();
        $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
        redirect('usercontroller');
    }
  }

  public function edit($id)
  {
    $data['user'] = $this->User_model->getUserById($id);
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('fullname','Fullname','required');
    $this->form_validation->set_rules('is_active','Is Active','required');
    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('user/edit',$data); 
      $this->load->view('template/footer');
      $this->session->set_flashdata('failed', 'Mohon Isi Field Diatas');
    }else{
        $this->User_model->UbahDataUser();
        $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('usercontroller');
    }
  }

  public function hapus($id){
    $this->User_model->HapusDataUser($id);
    $this->session->set_flashdata('flash', 'Berhasil Dihapus');
    redirect ('usercontroller');
}
}


/* End of file JenisObatController.php */
/* Location: ./application/controllers/JenisObatController.php */