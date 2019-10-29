<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    public static function ShopDetails($invoice_number){
        $shop_details=DB::select("
        SELECT
    sell_details.*,
    products.product_id AS p_id,
    products.product_name AS product_name
FROM
    sell_details
JOIN products ON products.id = sell_details.product_id
WHERE
    sell_details.invoice_number = '$invoice_number'
        
        
        ");
        return $shop_details;
    }
}
