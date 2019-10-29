<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    public static function GetActiveEmployees(){
        $employees=DB::select("
        SELECT
    users.*,
    logins.created_at AS last_login
FROM
    users
LEFT JOIN logins ON logins.created_at =(
    SELECT
        MAX(created_at)
    FROM
        logins
    WHERE
        user_id = users.id
)
WHERE
    users.type NOT LIKE 'Admin' AND users.status = 1
        ");

        return $employees;
    }


    public static function GetDeletedEmployees(){
        $employees=DB::select("
        SELECT
    users.*,
    logins.created_at AS last_login
FROM
    users
LEFT JOIN logins ON logins.created_at =(
    SELECT
        MAX(created_at)
    FROM
        logins
    WHERE
        user_id = users.id
)
WHERE
    users.type NOT LIKE 'Admin' AND users.status = 0
        ");

        return $employees;
    }
}
