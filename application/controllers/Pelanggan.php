<?php
use chriskacerguis\RestServer\RestController;
class Pelanggan extends RestController
{
    public function __construct()
    {
        parent ::__construct();
        $this->load->model('Pelanggan_model','plg');
        $this->methods['index_get']['limit'] = 2;

    }

    public function index_get()
    {
        $id = $this-> get ('id',true);
        if($id === null)
        {
            $p = $this->get('page',true);
            $p =(empty($p)?1:$p);
            $total_data = $this->plg->count();
            $total_page = ceil($total_data/5);
            $start =( $p - 1 ) * 5;
            $list = $this->plg->get(null,5 ,$start);
            if($list){
                $data =[
                    'status' => $total_data,
                    'page'  => $p,
                    'total_data' => $total_data,
                    'total page' => $total_page,
                    'data' => $list
                ];
            }
            else
            {
                $data = ['status'=>false,
                'msg'=>'Data Tidak Ditemukan'];
            }
            
            $this->response($data,RestController::HTTP_OK);
        }
        else
        {
            $data =$this->plg->get($id);
            if($data)
            {
            $this->response(['status' => true,'data' => $data ],RestController::HTTP_OK);
             }
            else
            {
                $this->response(['status' => false,'msg' => $id.' Tidak Ditemukan' ],RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data=
        [
            'id' => $this -> post('id',true),
            'nama' => $this -> post('nama',true),
            'alamat' => $this -> post('alamat',true),
            'asal' => $this -> post('asal',true),
            'tujuan' => $this -> post('tujuan',true)
        ];
        $simpan = $this->plg->add($data);
        if($simpan['status'])
        {
            $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah ditambahkan'], RestController::HTTP_CREATED);
        }
        else
        {
            $this->response(['status'=> false, 'msg' =>$simpan['msg']],RestController::HTTP_INTERNAL_ERROR);
        }
    }

    public function index_put()
    {
        $data=
        [
            'id' => $this -> put('id',true),
            'nama' => $this -> put('nama'.true),
            'alamat' => $this -> put('alamat',true),
            'asal' => $this -> put('asal',true),
            'tujuan' => $this -> put('tujuan',true)
        ];
        $id= $this->put('id',true);
        if($id=== null)
        {
            $this->response(['status'=> false, 'msg' => 'masukan id yang akan dirubah'],RestController::HTTP_BAD_REQUEST);
        }
        
        $simpan = $this->plg->update($id,$data);
        if($simpan['status'])
        {
            $status = (int)$simpan['data'];
            if($status>0)
            
                $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah dirubah'], RestController::HTTP_OK);
            
            else
                $this->response(['status'=> false, 'msg' => 'Tidak ada data yang dirubah'],RestController::HTTP_BAD_REQUEST);
            
           
        }
        else
        {
            $this->response(['status'=> false, 'msg' =>$simpan['msg']],RestController::HTTP_INTERNAL_ERROR);
        }
    }

    public function index_delete()
    {
        $id= $this->delete('id',true);
        if($id=== null)
        {
            $this->response(['status'=> false, 'msg' => 'masukan id yang akan dihapus'],RestController::HTTP_BAD_REQUEST);
        }
        
        $delete = $this->plg->delete($id);
        if($delete['status'])
        {
            $status = (int)$delete['data'];
            if($status>0)
            
                $this->response(['status' => true, 'msg' => $id . ' Data telah dihapus'], RestController::HTTP_OK);
            
            else
                $this->response(['status'=> false, 'msg' => 'Tidak ada data yang dihapus '],RestController::HTTP_BAD_REQUEST);
            
           
        }
        else
        {
            $this->response(['status'=> false, 'msg' =>$delete['msg']],RestController::HTTP_INTERNAL_ERROR);
        }  
    }
}
?>