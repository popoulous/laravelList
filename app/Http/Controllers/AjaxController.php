<?php

namespace App\Http\Controllers;

use App\Models\TODO;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    private $todo_id = "";

    public function get(Request $request) {
        if(!empty($request) && !empty($request->get("id"))){
            $this->todo_id = intval($request->get("id"));

            $todo = TODO::GetTodoByID($this->todo_id);

            return response()->json(array('msg'=> "success",'todo' => $todo), 200);
        }else{
            return response()->json(array('msg'=> "A keresett feladat nem található"), 404);
        }


    }
}
