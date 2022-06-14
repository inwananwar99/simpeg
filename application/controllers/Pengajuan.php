<?php
class Pengajuan extends CI_Controller{
    public function mutasi(){
        $id = $this->session->userdata('id_user');
        $data = [
            'pengajuan' => $this->ModelPengajuan->getJoin(),
            'user' => $this->ModelUser->getJoinn($id),
            'konten' => 'pendidikan/mutasi',
            'title' => 'mutasi'
        ];
        $this->load->view('skydash',$data);
    }

    public function addMutasi(){
        $data = [
            'nip' => $this->input->post('nip'),
            'id_user' => $this->input->post('id_user'),
            'alasan' => $this->input->post('alasan'),
            'tgl_pengajuan' => date('Y-m-d'),
            'status_pengajuan' => 'Belum Disetujui'
        ];
        $this->ModelPengajuan->add('pengajuan_mutasi',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
        return redirect('Pengajuan/mutasi');
    }

    public function updateMutasi($id){
        $data = [
            'nip' => $this->input->post('nip'),
            'id_user' => $this->input->post('id_user'),
            'alasan' => $this->input->post('alasan'),
            'tgl_pengajuan' => date('Y-m-d')
        ];
        $this->ModelPengajuan->update(['id_aju_mutasi' => $id],'pengajuan_mutasi',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Pengajuan!</div>');
        return redirect('Pengajuan/mutasi');
    }
    
    public function deleteMutasi($id){
        $this->ModelPengajuan->delete(['id_aju_mutasi' => $id],'pengajuan_mutasi');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Berhasil menghapus Data Pengajuan!</div>');
        return redirect('Pengajuan/mutasi');
    }
    
}
?>