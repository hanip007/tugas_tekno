<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Jenis_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Jenis_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function TambahDataJenis()
  {
    $data = [
      "nama_jenis_obat" => $this->input->post('nama_jenis_obat', true),
    ];
    $this->db->insert('tb_jenis_obat', $data);
  }

  public function getJenisById($id){
    $query =  $this->db->get_where('tb_jenis_obat',['id_jenis_obat' => $id]);
    return $query->row_array();
  }

  public function getAllJenis()
  {
    $query = $this->db->get('tb_jenis_obat');
    return $query->result_array();
  }

  public function UbahDataJenis()
  {
    $data = [
      "nama_jenis_obat" => $this->input->post('nama_jenis_obat', true),
    ];
    $this->db->where('id_jenis_obat',$this->input->post('id_jenis_obat'));
    $this->db->update('tb_jenis_obat', $data);
  }
public function HapusDataJenis($id)
{
  $this->db->delete('tb_jenis_obat', ['id_jenis_obat' => $id]);
}

public function HitungJenis()
{
  $this->db->from('tb_jenis_obat');
  return $this->db->count_all_results();
}

  // ------------------------------------------------------------------------

}

/* End of file Jenis_model.php */
/* Location: ./application/models/Jenis_model.php */