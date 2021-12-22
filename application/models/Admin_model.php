<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    private $table1 = "db_mts";
    private $table2 = "db_ma";
    private $table3 = "db_smp";
    private $table4 = "db_smk";
    private $table5 = "db_user";
    private $table6 = "db_kls";
    private $table7 = "db_setting";
    private $table8 = "db_info";
    private $table9 = "db_link_a";
    private $table10 = "db_link_d";

//=========================================================================================
    public function filter_kelas($par,$kls)
    {

        $db_pilih = "db_".$par;
        $this->db->where('kelas_aktf', $kls);
        $this->db->where('status', 'AKTIF');
        return $this->db->get($db_pilih)->result();
    }
    
//=========================================================================================
    public function getinfo()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get($this->table8)->result();
        // return $this->db->get_where($this->table8,array("status" => 'AKTIF'))->result();
    }

//=========================================================================================
    public function getlink()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get($this->table9)->result();
    }

//=========================================================================================
    public function getlink_a()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get($this->table10)->result();
    }
//=========================================================================================
    public function get_data($par)
    {
        $db_pilih = "db_".$par;
        $this->db->where('status', 'AKTIF');
        return $this->db->get($db_pilih)->result();
    }

//=========================================================================================
    public function get_backup($par)
    {
        $db_pilih = "db_".$par;
        // $this->db->where('status', 'AKTIF');
        return $this->db->get($db_pilih)->result();
    }
//=========================================================================================

    public function getmts2()
    {
        return $this->db->get_where($this->table1,array("status" => 'AKTIF'))->result();
    }

    public function getmts()
    {
        // return $this->db->get($this->table1)->result();
        // return $this->db->get_where($this->table1,array("status" => 'AKTIF'))->result();
        $this->db->where('status', 'AKTIF');
        return $this->db->get($this->table1)->result();
	}

    public function getvalid_mts()
    {
        $this->db->or_where('status', 'PENGAJUAN MUTASI');
        $this->db->or_where('status', 'PROSES MUTASI');
        return $this->db->get($this->table1)->result();
    }

    public function getmts_out()
    {
        return $this->db->get_where($this->table1,array("status" => 'NON AKTIF'))->result();
    }

    public function savemts($data)
    {
        return $this->db->insert($this->table1, $data);
    }

    public function fil_mts($kelas)
    {
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where('status', 'AKTIF');
        return $this->db->get($this->table1)->result();
    }

    public function filvalid_mts($kelas)
    {
        $status_array = array('AKTIF','PENGAJUAN MUTASI','PROSES MUTASI');
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where_in('status', $status_array);
        return $this->db->get($this->table1)->result();
    }

    public function fil_mts_out($kelas)
    {
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where('status', 'NON AKTIF');
        return $this->db->get($this->table1)->result();
    }

    public function getByIdmts($id)
    {
        return $this->db->get_where($this->table1, ["id" => $id])->row();
    }

    public function getById($param,$id)
    {
        $tabel = "db_".$param;
        return $this->db->get_where($tabel, ["id" => $id])->row();
    }

    public function updatemts($data,$id)
    {
        return $this->db->update($this->table1, $data, array('id' => $id));
    }

    public function delmts($id)
    {
        return $this->db->delete($this->table1, array("id" => $id));
    }
//=========================================================================================
    public function getma()
    {
        return $this->db->get_where($this->table2,array("status" => 'AKTIF'))->result();
    }

    public function getvalid_ma()
    {
        $this->db->or_where('status', 'PENGAJUAN MUTASI');
        $this->db->or_where('status', 'PROSES MUTASI');
        return $this->db->get($this->table2)->result();
    }

    public function getma_out()
    {
        return $this->db->get_where($this->table2,array("status" => 'NON AKTIF'))->result();
    }

    public function savema($data)
    {
        return $this->db->insert($this->table2, $data);
    }

    public function fil_ma($kelas)
    {
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where('status', 'AKTIF');
        return $this->db->get($this->table2)->result();
    }

    public function filvalid_ma($kelas)
    {
        $status_array = array('AKTIF','PENGAJUAN MUTASI','PROSES MUTASI');
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where_in('status', $status_array);
        return $this->db->get($this->table2)->result();
    }

    public function fil_ma_out($kelas)
    {
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where('status', 'NON AKTIF');
        return $this->db->get($this->table2)->result();
    }

    public function getByIdma($id)
    {
        return $this->db->get_where($this->table2, ["id" => $id])->row();
    }

    public function updatema($data,$id)
    {
        return $this->db->update($this->table2, $data, array('id' => $id));
    }

    public function delma($id)
    {
        return $this->db->delete($this->table2, array("id" => $id));
    }

//=========================================================================================
    public function getsmp()
    {
        return $this->db->get_where($this->table3,array("status" => 'AKTIF'))->result();
    }

    public function getvalid_smp()
    {
        $this->db->or_where('status', 'PENGAJUAN MUTASI');
        $this->db->or_where('status', 'PROSES MUTASI');
        return $this->db->get($this->table3)->result();
    }

    public function getsmp_out()
    {
        return $this->db->get_where($this->table3,array("status" => 'NON AKTIF'))->result();
    }

    public function savesmp($data)
    {
        return $this->db->insert($this->table3, $data);
    }

    public function fil_smp($kelas)
    {
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where('status', 'AKTIF');
        return $this->db->get($this->table3)->result();
    }

    public function filvalid_smp($kelas)
    {
        $status_array = array('AKTIF','PENGAJUAN MUTASI','PROSES MUTASI');
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where_in('status', $status_array);
        return $this->db->get($this->table3)->result();
    }

    public function fil_smp_out($kelas)
    {
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where('status', 'NON AKTIF');
        return $this->db->get($this->table3)->result();
    }

    public function getByIdsmp($id)
    {
        return $this->db->get_where($this->table3, ["id" => $id])->row();
    }

    public function updatesmp($data,$id)
    {
        return $this->db->update($this->table3, $data, array('id' => $id));
    }

    public function delsmp($id)
    {
        return $this->db->delete($this->table3, array("id" => $id));
    }

//=========================================================================================
    public function getsmk()
    {
        return $this->db->get_where($this->table4,array("status" => 'AKTIF'))->result();
    }

    public function getvalid_smk()
    {
        $this->db->or_where('status', 'PENGAJUAN MUTASI');
        $this->db->or_where('status', 'PROSES MUTASI');
        return $this->db->get($this->table4)->result();
    }

    public function getsmk_out()
    {
        return $this->db->get_where($this->table4,array("status" => 'NON AKTIF'))->result();
    }

    public function savesmk($data)
    {
        return $this->db->insert($this->table4, $data);
    }

    public function fil_smk($kelas)
    {
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where('status', 'AKTIF');
        return $this->db->get($this->table4)->result();
    }

    public function filvalid_smk($kelas)
    {
        $status_array = array('AKTIF','PENGAJUAN MUTASI','PROSES MUTASI');
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where_in('status', $status_array);
        return $this->db->get($this->table4)->result();
    }

    public function fil_smk_out($kelas)
    {
        $this->db->where('kelas_aktf', $kelas);
        $this->db->where('status', 'NON AKTIF');
        return $this->db->get($this->table4)->result();
    }

    public function getByIdsmk($id)
    {
        return $this->db->get_where($this->table4, ["id" => $id])->row();
    }

    public function updatesmk($data,$id)
    {
        return $this->db->update($this->table4, $data, array('id' => $id));
    }

    public function delsmk($id)
    {
        return $this->db->delete($this->table4, array("id" => $id));
    }
//=========================================================================================
    public function deluser($id)
    {
        return $this->db->delete($this->table5, array("id" => $id));
    }

    public function saveuser($data)
    {
        return $this->db->insert($this->table5, $data);
    }

    public function updateuser($data,$id)
    {
        return $this->db->update($this->table5, $data, array('id' => $id));
    }

    public function getuser()
    {
        //$this->db->order_by('last', 'desc');
        return $this->db->get($this->table5)->result();
    }

    public function getuser_h()
    {
        $this->db->order_by('last', 'desc');
        return $this->db->get_where($this->table5,array("jabatan !=" => 'admin'))->result();
    }

    public function getuserdas()
    {
        $this->db->order_by('last', 'desc');
        $this->db->limit(8);        
        return $this->db->get($this->table5)->result();
    }

    public function getByIduser($id)
    {
        return $this->db->get_where($this->table5, ["id" => base64_decode($id)])->row();
    }

//=========================================================================================
    
    public function profiler($id)
    {
        return $this->db->get_where($this->table5, ["id" => $id])->row();
    }

//=========================================================================================

    public function getkls()
    {
        return $this->db->get($this->table6)->result();
    }

    public function getkls_V($param,$id)
    {
        return $this->db->get_where($this->table6,array("par" => $param,"kelas" => $id))->result();
    }

    public function getkls_mts()
    {
        $this->db->order_by('kelas', 'asc');
        return $this->db->get_where($this->table6,array("par" => 'mts'))->result();
    }

    public function getkls_ma()
    {
        $this->db->order_by('kelas', 'asc');
        return $this->db->get_where($this->table6,array("par" => 'ma'))->result();
    }

    public function getkls_smp()
    {
        $this->db->order_by('kelas', 'asc');
        return $this->db->get_where($this->table6,array("par" => 'smp'))->result();
    }

    public function getkls_smk()
    {
        $this->db->order_by('kelas', 'asc');
        return $this->db->get_where($this->table6,array("par" => 'smk'))->result();
    }

//=========================================================================================
    public function savinfo($data)
    {
        return $this->db->insert($this->table8, $data);
    }

    public function delinfo($id)
    {
        return $this->db->delete($this->table8, array("id" => $id));
    }

//=========================================================================================
    public function savlink($data)
    {
        return $this->db->insert($this->table9, $data);
    }

    public function updatelink($data,$id)
    {
        return $this->db->update($this->table9, $data, array('id' => $id));
    }

    public function dellink($id)
    {
        return $this->db->delete($this->table9, array("id" => $id));
    }

//=========================================================================================
    public function savlinka($data)
    {
        return $this->db->insert($this->table10, $data);
    }

    public function updatelinka($data,$id)
    {
        return $this->db->update($this->table10, $data, array('id' => $id));
    }

    public function dellinka($id)
    {
        return $this->db->delete($this->table10, array("id" => $id));
    }
//=========================================================================================
    public function savkls($data)
    {
        return $this->db->insert($this->table6, $data);
    }

    public function updatekls($data,$id)
    {
        return $this->db->update($this->table6, $data, array('id' => $id));
    }

    public function delkls($id)
    {
        return $this->db->delete($this->table6, array("id" => $id));
    }

//=========================================================================================
    public function savset($data)
    {
        return $this->db->insert($this->table7, $data);
    }

    public function editset($data,$id)
    {
        return $this->db->update($this->table7, $data, array('id' => $id));
    }

    public function getset()
    {
        return $this->db->get_where($this->table7, ["id" => 1])->result();
    }

    public function getset2()
    {
        return $this->db->get_where($this->table7, ["id" => 1])->row();
    }

//=========================================================================================
    public function upload_file($filename)
    {
        $this->load->library('upload');
        
        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '10000';
        $config['overwrite'] = true;
        $config['file_name'] =  $filename;
    
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){ 
            return array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        }else{
            return array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        }
    }

//=========================================================================================
    public function insert_multi($data,$par)
    {
        $db_pilih = 'db_'.$par;
        $this->db->insert_batch($db_pilih, $data);
    }

}
