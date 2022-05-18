<?php
class ModelPengajuan extends CI_Model{
    public function getData($table){
        return $this->db->get($table)->result_array();
    }

    public function add($table,$data){
        return $this->db->insert($table,$data);
    }

    public function update($id,$table,$data){
        $this->db->where($id);
        return $this->db->update($table,$data);
    }

    public function delete($id,$table){
        $this->db->where($id);
        return $this->db->delete($table);
    }
    public function getJoin(){
        $this->db->select('*');
        $this->db->from('pengajuan_mutasi'); // this is first table name
        $this->db->join('data_pegawai', 'data_pegawai.nip = pengajuan_mutasi.nip'); // this is second table name with both table ids
        return $this->db->get()->result_array();
    }

}
?>