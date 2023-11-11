<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TODO extends Model
{
    use HasFactory;

    private $perpage = 10;
    private $page = 0;
    private $sort = "DESC";

    public static function GetTodos($pageSettings){
        if(!empty($pageSettings["status"])){
            $todos = DB::table('todos')->where('status', $pageSettings["status"])->orderBy('id',$pageSettings["sort"])->limit($pageSettings["perpage"])->offset(($pageSettings["page"] - 1) * $pageSettings["perpage"])->get()->toArray();
        }else{
            $todos = DB::table('todos')->orderBy('id',$pageSettings["sort"])->limit($pageSettings["perpage"])->offset(($pageSettings["page"] - 1) * $pageSettings["perpage"])->get()->toArray();
        }

        return $todos;



    }




}
