<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SellDetail extends Model
{
    public static function Bill($invoice_number){
        $bills=DB::select("
        SELECT
    sell_details.*,
    products.product_id AS p_id,
    products.product_name AS product_name
FROM
    sell_details
JOIN products ON sell_details.product_id = products.id
WHERE
    sell_details.invoice_number = '$invoice_number'
        
        ");

        return $bills;
    }
}
