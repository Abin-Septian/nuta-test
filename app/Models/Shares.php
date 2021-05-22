<?php

namespace App\Models;

use CodeIgniter\Model;

class Shares extends Model
{
    //Share revenue berdasar harga setelah markup (rename for disable this function)
	public function shareRevenue($realPrice, $markup_persen, $share_persen)
    {
        $this->netPrice     = ($realPrice + ($realPrice * $markup_persen / 100));
        $this->shareRevenue = $this->netPrice * $share_persen / 100;

        $this->data = array(
            'net_untuk_resto' => round($this->netPrice),
            'share_untuk_ojol' => round($this->shareRevenue)
        );

        return json_encode($this->data);
    }

    //Share revenue berdasar harga sebelum markup (rename for use this function)
    public function shareRevenue_($realPrice, $markup_persen, $share_persen)
    {
        $this->netPrice     = ($realPrice + ($realPrice * $markup_persen / 100));
        $this->shareRevenue = $realPrice * $share_persen / 100;

        $this->data = array(
            'net_untuk_resto' => round($this->netPrice),
            'share_untuk_ojol' => round($this->shareRevenue)
        );

        return json_encode($this->data);
    }
}
