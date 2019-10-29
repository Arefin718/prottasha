<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Deposit extends Model
{
    public static function DepositHistory(){
        $deposits=DB::select("SELECT deposits.*, members.member_id as member_id, members.name as name, 
                                    users.name as added_name
                                    FROM deposits, members,users 
                                    WHERE deposits.member_id=members.id and deposits.added_by=users.id
                                    ORDER BY deposits.id DESC
                                    ");


        return $deposits;
    }

    public static function DepositHistoryByID($id){
        $deposits=DB::select("SELECT deposits.*, members.*,  users.name as added_name
                                    FROM deposits, members,users 
                                    WHERE deposits.member_id=$id and deposits.added_by=users.id AND members.id=$id
                                    ORDER BY deposits.deposit_date DESC");


        return $deposits;
    }

}
