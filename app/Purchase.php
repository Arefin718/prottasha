<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    public static function GetPurchaseList(){
        $purchases=DB::select("
        SELECT
    purchases.*,
    products.product_id AS p_id,
    products.product_name AS product_name,
    users.name AS added_name
FROM
    purchases
JOIN products ON purchases.product_id = products.id
JOIN users ON purchases.added_by = users.id
WHERE
    purchases.status = 1
ORDER BY
    purchases.id
DESC 
        ");
        return $purchases;
    }

    public static function FindPurchaseByID($id){
        $purchase=DB::select("
        SELECT
    purchases.*,
    products.product_id AS p_id,
    products.product_name
FROM
    purchases
JOIN products ON purchases.product_id = products.id
WHERE
    purchases.status = 1 AND purchases.id = $id
        
        ");


        return $purchase;

    }
    public static function TotalPurchaseByProductID($id){
        $total_purchase=DB::select("
      SELECT
    SUM(p.added_quantity) AS total_purchase,
    SUM(s.quantity) AS total_sell,
    SUM(p.added_quantity)- SUM(s.quantity) AS available_quantity
FROM
    purchases p
    LEFT JOIN sells s ON p.product_id=s.product_id
WHERE p.status=1 and p.product_id=1

GROUP BY
    p.product_id
        
        ");


        return $total_purchase;

    }

}
