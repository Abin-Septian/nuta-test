<?php

namespace App\Models;

use CodeIgniter\Model;

class Taxs extends Model
{
    public function preTaxPrice($total, $tax)
    {
        $this->net_sales    = $total * 100 / (100 + $tax);
        $this->pajak_rp     = $total * $tax / (100 + $tax);

        $this->data = array(
            'net_sales' => $this->net_sales,
            'pajak_rp' => $this->pajak_rp
        );

        return json_encode($this->data);
    }
}
