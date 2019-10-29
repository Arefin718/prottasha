<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
public static function GetMemberByID($id){
    $member=DB::select("SELECT
    members.*,
    u1.name AS added_name,
    u2.name AS updated_name,
    d1.deposit_amount AS deposit_amount,
    d1.total_deposit AS total_deposit,
    s1.purchase_amount AS purchase_amount,
    s1.payment_due AS payment_due
FROM
    members
INNER JOIN users u1 ON
    members.added_by = u1.id
LEFT JOIN users u2 ON
    members.updated_by = u2.id
LEFT JOIN(
    SELECT
        member_id,
        SUM(amount) AS deposit_amount,
        COUNT(member_id) AS total_deposit
    FROM
        deposits
    GROUP BY
        1
) d1
ON
    d1.member_id = members.id
LEFT JOIN(
    SELECT
        member_id,
        SUM(payment_amount) AS purchase_amount,
        SUM(payment_due) AS payment_due
    FROM
        sells
    GROUP BY
        1
) s1
ON
    s1.member_id = members.id
WHERE
    members.id = 1
GROUP BY
    members.id,
    members.member_id,
    members.name,
    members.current_address,
    members.parmanent_address,
    members.contact_number,
    members.registration_date,
    members.bookissue_date,
    members.registration_fee,
    members.added_by,
    members.updated_by,
    members.status,
    members.image,
    members.created_at,
    members.updated_at,
    u1.name,
    u2.name,
    d1.deposit_amount,
    d1.total_deposit,
    s1.purchase_amount,
    s1.payment_due
    ");


    return $member;
}

public static function SearchMemberFromShop($id){
    $member=DB::select("
 SELECT
    m.id,
    m.member_id,
    m.name,
    m.contact_number,
    SUM(s.total_amount) AS purchase_amount,
    SUM(s.payment_due) AS payment_due,
    SUM(d.amount) AS deposit_amount
FROM
    members m
LEFT JOIN(
    SELECT
        sells.member_id,
        SUM(sells.total_amount) AS total_amount,
        SUM(sells.payment_due) AS payment_due
    FROM
        sells
    GROUP BY
        1
) s
ON
    s.member_id = m.id
LEFT JOIN(
    SELECT
        deposits.member_id,
        SUM(deposits.amount) AS amount
    FROM
        deposits
    GROUP BY
        1
) d
ON
    d.member_id = m.id
WHERE
    m.member_id = $id
GROUP BY
    m.id,
    m.member_id,
    m.name,
    m.contact_number
    
    ");
    return $member;
}


}



