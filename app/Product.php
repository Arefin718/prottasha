<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    public static function GetProduct($keyword){
        $products=Product::select("
                            SELECT * FROM products WHERE( product_id LIKE $keyword .'%' OR product_name LIKE $keyword .'%')
                            AND status = 1
                                    ");


        return $products;
    }
    public static function GetProductByID($id){
       /* $productDetails=Product::select("
        SELECT
    products.*,
    u1.name as added_name,
    u2.name as updated_name
FROM
    products
JOIN users u1 ON
    products.added_by = u1.id
JOIN users u2 ON
    products.updated_by = u2.id
WHERE
    products.id = $id           
        ")->get();*/
        $productDetails=Product::select('products.*','users.name as updated_name')
            ->join('users','products.updated_by', '=', 'users.id')

            ->where('products.id','=',$id)->get();
        return $productDetails;
    }

    public static function GetSellingProducts(){
        $purchase_sell=DB::select("
     SELECT
p.product_id,
    SUM(p.added_quantity) AS total_purchase,
    SUM(s.quantity) AS total_sell
    
FROM
    purchases p
LEFT JOIN sells s ON
    p.product_id = s.product_id
WHERE
    p.status = 1
GROUP BY
    p.product_id
        
        ");


        return $purchase_sell;
    }

    public static function SearchProductFromShop($id){
        $product=DB::select("
        SELECT
    p.id,
    p.product_id,
    p.product_name,
    p.start_quantity,
    p.selling_price,
    SUM(p1.added_quantity) AS total_purchase,
    SUM(s.quantity) AS total_sell
FROM
    products p
LEFT JOIN (
   SELECT purchases.product_id, SUM(purchases.added_quantity) AS added_quantity
   FROM   purchases
   GROUP  BY 1
   ) p1 ON
    p.id = p1.product_id
LEFT JOIN  (
   SELECT sell_details.product_id, SUM(sell_details.quantity) AS quantity
   FROM   sell_details
   GROUP  BY 1
   )  s ON
    p.id = s.product_id
WHERE
    p.status = 1 AND p.product_id = $id
GROUP BY
    p.id,
    p.product_id,
    p.product_name,
    p.start_quantity,
    p.selling_price
        ");

        return $product;
    }

}
