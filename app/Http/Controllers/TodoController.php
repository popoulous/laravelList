<?php

namespace App\Http\Controllers;

use App\Models\TODO;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo_id = 0;

    public function detail(Request $request){

        if(!empty($request) && !empty($request->get("id"))){
            $this->todo_id = intval($request->get("id"));

            $todo = TODO::GetTodoByID($this->todo_id);

            $users = TODO::GetTodoUsers($this->todo_id);

            return View("layouts.detail" , ["todo" => $todo,"users" => $users]);
        }else{
            return redirect()->to('/');
        }
    }
}
