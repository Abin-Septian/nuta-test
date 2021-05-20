<?php

namespace App\Models;

use CodeIgniter\Model;

class Discounts extends Model
{
	public function discountPrice($discounts, $total)
    {
        $totalDiscount  = 0;

        $n = 1;
        foreach ($discounts as $key => $value) {
            $n  = $n - ($n * $value->diskon / 100);
        }

        $this->totalDiscount = (1 - $n) * $total;
        $this->netPrice = $n * $total;

        $this->data = array(
            'total_diskon' => round($this->totalDiscount),
            'total_harga_setelah_diskon' => round($this->netPrice)
        );

        return json_encode($this->data);
    }
}
