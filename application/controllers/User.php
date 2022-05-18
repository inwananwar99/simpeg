<?php
class User extends CI_Controller{
    public function index(){
        $data = [
            // 'user' => $this->ModelUser->getJoin(),
            'users' => $this->ModelUser->getData('user'),
            'konten' => 'admin/pegawai/index',
            'title' => 'user',
            'judul' => 'Data User'
        ];
        $this->load->view('template',$data);
    }

    public function addUser(){
        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        ];
        $this->ModelUser->add('user',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
        return redirect('User');
    }

    public function updateUser($id){
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'level' => $this->input->post('level')
            ];
        $this->ModelUser->update(['id_user'=> $id],'user',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data User!</div>');
        return redirect('User');
    }

    public function deleteUser($id){
        $this->ModelUser->delete(['id_user' => $id],'user');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Berhasil menghapus Data User!</div>');
        return redirect('User');
    }

    public function pegawai(){
        $data = [
            'join' => $this->ModelUser->getJoin(),
            'users' => $this->ModelUser->getData('user'),
            'bagian' => $this->ModelUser->getData('bagian'),
            'pegawai' => $this->ModelUser->getData('data_pegawai'),
            'konten' => 'admin/pegawai/pegawai',
            'title' => 'pegawai',
            'judul' => 'Data Pegawai'
        ];
        $this->load->view('template',$data);
    }

    public function addPegawai(){
            $config['upload_path']          = './assets/images';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Silahkan upload foto Anda terlebih dahulu!</div>');
                return redirect('User/pegawai');
            }else{
                $data = [
                    'nip' => $this->input->post('nip'),
                    'nama_peg' => $this->input->post('nama'),
                    'tempat_lahir' => $this->input->post('tempat'),
                    'tanggal_lahir' => $this->input->post('tgl'),
                    'alamat' => $this->input->post('alamat'),
                    'id_bagian' => $this->input->post('id_bagian'),
                    'pangkat_golongan' => $this->input->post('pangkat'),
                    'gaji' => $this->input->post('gaji'),
                    'foto' => $this->upload->data('file_name'),
                    'karpeg' => $this->input->post('karpeg'),
                    'jenis_kelamin' => $this->input->post('jk'),
                    'agama' => $this->input->post('agama'),
                    'jabatan' => $this->input->post('masa'),
                    'usia' => $this->input->post('usia'),
                    'status_aktif' => $this->input->post('status_aktif'),
                    'id_user' => $this->input->post('id_user'),
                    'id_bagian' => $this->input->post('id_bagian'),
                ];
            }
        $this->ModelUser->add('data_pegawai',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
        return redirect('User/pegawai');
    }

    public function updatePegawai($id){
        $config['upload_path']          = './assets/images';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('foto')){
            $data = [
                'nip' => $this->input->post('nip'),
                'nama_peg' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat'),
                'tanggal_lahir' => $this->input->post('tgl'),
                'alamat' => $this->input->post('alamat'),
                'id_bagian' => $this->input->post('id_bagian'),
                'pangkat_golongan' => $this->input->post('pangkat'),
                'gaji' => $this->input->post('gaji'),
                'karpeg' => $this->input->post('karpeg'),
                'jenis_kelamin' => $this->input->post('jk'),
                'agama' => $this->input->post('agama'),
                'masa' => $this->input->post('masa'),
                'usia' => $this->input->post('usia'),
                'status_aktif' => $this->input->post('status_aktif'),
                'id_user' => $this->input->post('id_user'),
                'id_bagian' => $this->input->post('id_bagian'),
            ];
        }else{
            $data = [
                'nip' => $this->input->post('nip'),
                'nama_peg' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat'),
                'tanggal_lahir' => $this->input->post('tgl'),
                'alamat' => $this->input->post('alamat'),
                'id_bagian' => $this->input->post('id_bagian'),
                'pangkat_golongan' => $this->input->post('pangkat'),
                'gaji' => $this->input->post('gaji'),
                'foto' => $this->upload->data('file_name'),
                'karpeg' => $this->input->post('karpeg'),
                'jenis_kelamin' => $this->input->post('jk'),
                'agama' => $this->input->post('agama'),
                'masa' => $this->input->post('masa'),
                'usia' => $this->input->post('usia'),
                'status_aktif' => $this->input->post('status_aktif'),
                'id_user' => $this->input->post('id_user'),
                'id_bagian' => $this->input->post('id_bagian'),
            ];
        }
        $this->ModelUser->update(['NIP'=> $id],'data_pegawai',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data User!</div>');
        return redirect('User/pegawai');
    }

    public function deletePegawai($id){
        $this->ModelUser->delete(['NIP' => $id],'data_pegawai');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Berhasil menghapus Data Pegawai!</div>');
        return redirect('User/pegawai');
    }

    public function bagian(){
        $data = [
            'bagian' => $this->ModelUser->getData('bagian'),
            'konten' => 'admin/pegawai/bagian',
            'title' => 'bagian',
            'judul' => 'Data Bagian'
        ];
        $this->load->view('template',$data);
    }
    public function addBagian(){
        $data = [
            'nama_bagian' => $this->input->post('bagian')
        ];
        if(!$data){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Silahkan diisi terlebih dahulu!</div>');
            return redirect('User/bagian');
        }else{
            $this->ModelUser->add('bagian',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan Data Bagian!</div>');
            return redirect('User/bagian');
        }
    }
    public function updateBagian($id){
        $data = [
            'nama_bagian' => $this->input->post('bagian')
        ];
        if(!$data){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Silahkan diisi terlebih dahulu!</div>');
            return redirect('User/bagian');
        }else{
            $this->ModelUser->update(['id_bagian'=> $id],'bagian',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Bagian!</div>');
            return redirect('User/bagian');
        }
    }
    public function deleteBagian($id){
        $this->ModelUser->delete(['id_bagian' => $id],'bagian');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Berhasil menghapus Data Bagian!</div>');
        return redirect('User/bagian');
    }


}

?>