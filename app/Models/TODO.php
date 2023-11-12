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

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    protected $hidden = [
        'id',
        'assigned_users'
    ];

    public static function GetTodos($pageSettings){
        if(!empty($pageSettings["status"])){
            $todos = DB::table('todos')
                ->select('todos.id','todos.name','todos.status',DB::raw("(SELECT count(userid) FROM todo2users WHERE todo2users.todoid = todos.id) as count"))
                ->where('status', $pageSettings["status"])
                ->orderBy('todos.id',$pageSettings["sort"])
                ->limit($pageSettings["perpage"])
                ->offset(($pageSettings["page"] - 1) * $pageSettings["perpage"])
                ->get()
                ->toArray();
        }else{
            $todos = DB::table('todos')
                ->select('todos.id','todos.name','todos.status',DB::raw("(SELECT count(userid) FROM todo2users WHERE todo2users.todoid = todos.id) as count"))
                ->orderBy('todos.id',$pageSettings["sort"])
                ->limit($pageSettings["perpage"])
                ->offset(($pageSettings["page"] - 1) * $pageSettings["perpage"])
                ->get()
                ->toArray();
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

    public static function GetTodoUsers($id){
        $todos = DB::table('users')->join("todo2users","users.id","=","todo2users.userid")->where('todo2users.todoid', $id)->get()->toArray();
        return $todos;
    }

    public static function AddTodoUser($todoid,$userid){
        DB::table('todo2users')->insert(array("todoid" => $todoid,"userid" => $userid));
    }

    public static function RemoveTodoUsers($todoid){
        DB::table('todo2users')->where("todoid", $todoid)->delete();
    }






}
