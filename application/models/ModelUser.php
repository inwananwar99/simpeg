<?php
class ModelUser extends CI_Model{
    public function getData($table){
        return $this->db->get($table)->result_array();
    }

    public function add($table,$data){
        return $this->db->insert($table, $data);
    }

    public function update($id,$table,$data){
        $this->db->where($id);
        return $this->db->update($table,$data);
    }

    public function delete($id,$table){
        $this->db->where($id);
        return $this->db->delete($table);
    }

    public function getByUsername($username){
        return $this->db->get_where('user',['username'=> $username])->row_array();
    }

    public function getJoin(){
        $this->db->select('*');
        $this->db->from('data_pegawai'); // this is first table name
        $this->db->join('bagian', 'bagian.id_bagian = data_pegawai.nip'); // this is second table name with both table ids
        return $this->db->get();
    }

    public function getJoinn($id){
        $this->db->select('*');
        $this->db->from('data_pegawai'); // this is first table name
        $this->db->join('user', 'user.id_user = data_pegawai.id_user'); // this is second table name with both table ids
        $this->db->where('user.id_user',$id); // this is second table name with both table ids
        return $this->db->get()->result_array();
    }
}
?>