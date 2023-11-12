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
    protected $table = 'todos';

    public $fillable = ['name', 'description', 'status','id'];

    public static function GetTodos($pageSettings){
        if(!empty($pageSettings["status"])){
            $todos = DB::table('todos')->where('status', $pageSettings["status"])->orderBy('id',$pageSettings["sort"])->limit($pageSettings["perpage"])->offset(($pageSettings["page"] - 1) * $pageSettings["perpage"])->get()->toArray();
        }else{
            $todos = DB::table('todos')->orderBy('id',$pageSettings["sort"])->limit($pageSettings["perpage"])->offset(($pageSettings["page"] - 1) * $pageSettings["perpage"])->get()->toArray();
        }

        return $todos;
    }

    public static function GetTodoByID($id){
        $todo = DB::table('todos')->where('id', $id)->get()->toArray();

        if(!empty($todo[0])){
            $todo = $todo[0];
        }else{
            $todo = array();
        }

        return $todo;
    }

    public static function GetAllTodosCount(){
        return DB::table('todos')->count();
    }

    public static function DeleteTodo($id){
        DB::table('todos')->where('id', $id)->delete();
    }

    public static function edit($id,$data){
        DB::table('todos')->where('id', $id)->update(array($data));
        return TODO::GetTodoByID($id);
    }




}
