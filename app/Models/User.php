<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id'
    ];

    /**
     * @param $id
     * @return array
     */
    public static function GetUserByID($id){
        $user = DB::table('users')->where('id', $id)->get()->toArray();

        if(!empty($user[0])){
            $user = $user[0];
        }else{
            $user = array();
        }

        return $user;
    }

    /**
     * @return array
     */
    public static function GetUsers(){
        $todos = DB::table('users')->get()->toArray();
        return $todos;
    }


}
