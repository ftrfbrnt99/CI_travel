<?php

class Transaksi_model  extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function get($id = null, $limit = 5, $offset = 0)
    {
        if($id === null)
        {
            return $this->db->get('tb_transaksi', $limit, $offset)->result();
        }
        else
        {
            return $this->db->get_where('tb_transaksi', ['id'=>  $id])->result_array();
        }
       
    }

    public function count ()
    {
        return $this->db->get('tb_transaksi')->num_rows();
    }

    public function add($data)
    {
        try
        {
            $this->db->insert('tb_transaksi',$data);
            $error =$this->db->error();
            if(!empty($error['code']))
            {
                throw new Exception('Terjadi kesalahan: ' . $error['message']);
                return false;
            }
            return ['status' => true, 'data' => $this->db->affected_rows()];
        }
        catch(Exeption $ex)
        {
            return ['status '=> false,'msg'=>$ex->getMessage()];
        }
    }

    public function update($id,$data)
    {
        try
        {
            $this->db->update('tb_transaksi',$data,['id'=>$id]);
            $error =$this->db->error();
            if(!empty($error['code']))
            {
                throw new Exception('Terjadi kesalahan: ' . $error['message']);
                return false;
            }
            return ['status' => true, 'data' => $this->db->affected_rows()];
        }
        catch(Exeption $ex)
        {
            return ['status '=> false,'msg'=>$ex->getMessage()];
        }
    }

    public function delete($id)
    {
        try
        {
            $this->db->delete('tb_transaksi',['id'=>$id]);
            $error =$this->db->error();
            if(!empty($error['code']))
            {
                throw new Exception('Terjadi kesalahan: ' . $error['message']);
                return false;
            }
            return ['status' => true, 'data' => $this->db->affected_rows()];
        }
        catch(Exeption $ex)
        {
            return ['status '=> false,'msg'=>$ex->getMessage()];
        }
    }
}

?>