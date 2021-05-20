<?php

namespace App\Models;

use CodeIgniter\Model;

class Shares extends Model
{
	public function shareRevenue($realPrice, $markup_persen, $share_persen)
    {
        $this->netPrice     = ($realPrice + ($realPrice * $markup_persen / 100));
        $this->shareRevenue = $realPrice * $share_persen / 100;

        $this->data = array(
            'harga_setelah_markup' => round($this->netPrice),
            'net_untuk_resto' => round($this->netPrice - $this->shareRevenue),
            'share_untuk_ojol' => round($this->shareRevenue)
        );

        return json_encode($this->data);
    }
}
