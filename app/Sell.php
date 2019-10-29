<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sell extends Model
{



    public static function GetMemberPurchaseByID($id){
$purchases=DB::select("
SELECT DISTINCT
    (invoice_number) AS invoice_number,
    total_amount,
    payment_amount,
    payment_due,
    created_at
FROM
    sells
WHERE
    member_id = $id
");
return $purchases;
    }
}
