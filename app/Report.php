<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
     public static function DailySell(){
         $sells = DB::select("
SELECT
    SUM(total_amount) AS total_amount,
    SUM(payment_amount) AS amount_paid,
    SUM(payment_due) AS amount_due,
    DATE(created_at) AS date,
    sd.quantity AS total_quantity
FROM
    sells
LEFT JOIN(
    SELECT
        invoice_number,
        SUM(quantity) AS quantity
    FROM
        sell_details
    GROUP BY
        invoice_number
) sd
ON
    sd.invoice_number = sells.invoice_number
GROUP BY
    DATE(created_at),
    sd.quantity
ORDER BY
    created_at
DESC
    
    
        
         ");

         return $sells;
     }

     public static function SellByRange($request){
         $sells = DB::select("
SELECT
    SUM(total_amount) AS total_amount,
    SUM(payment_amount) AS amount_paid,
    SUM(payment_due) AS amount_due,
    DATE(created_at) AS date,
    sd.quantity AS total_quantity
FROM
    sells
LEFT JOIN(
    SELECT
        invoice_number,
        SUM(quantity) AS quantity
    FROM
        sell_details
    GROUP BY
        invoice_number
) sd
ON
    sd.invoice_number = sells.invoice_number
    WHERE created_at > '$request->from' AND created_at < '$request->to' 
GROUP BY
    DATE(created_at),
    sd.quantity
ORDER BY
    created_at
DESC
    
    
        
         ");

         return $sells;
     }
}
