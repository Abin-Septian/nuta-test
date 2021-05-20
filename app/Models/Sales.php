<?php

namespace App\Models;

use CodeIgniter\Model;

class Sales extends Model
{
    public function saveBill($data){

        $db = \Config\Database::connect();

        $db->transBegin();
        
        $bill = array(
            'Tanggal'         => $data->Tanggal,
            'Jam'             => $data->Jam,
            'NamaPelanggan'   => $data->NamaPelanggan,
            'Total'           => $data->Total,
            'BayarTunai'      => $data->BayarTunai,
            'Kembali'         => $data->Kembali,
            'TglJamUpdate'    => date('Y-m-d H:i:s')
        );

        
        $db->table('penjualan')->insert($bill);

        $id = $db->insertID();
        
        foreach($data->DetilPenjualan as $key => $value) {
        
            $billDetail = array(
                'TransactionID' => $id,
                'NamaItem'      => $value->Item,
                'Quantity'      => $value->Qty,
                'HargaSatuan'   => $value->HargaSatuan,
                'SubTotal'      => $value->SubTotal,
                'TglJamUpdate'  => date('Y-m-d H:i:s')
            );

            $db->table('penjualandetil')->insert($billDetail);
        }

        //check transaction
        if ($db->transStatus() === FALSE)
        {
            $db->transRollback();

            echo 'transaction failed';
        }
        else
        {
            $db->transCommit();

            echo 'transaction success';
        }
    } 
}
