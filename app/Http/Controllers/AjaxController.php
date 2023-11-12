<?php

namespace App\Http\Controllers;

use App\Models\TODO;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    private $todo_id = "";

    public function index(Request $request){
        if(!empty($request->get("mode"))){
            $mode = $request->get("mode");

            return $this->modeSwitcher($mode,$request);
        }else{
            return response()->json(array('msg'=> "A keresett mód nem található"), 404);
        }
    }

    private function modeSwitcher($mode, Request $request){
        $request->request->remove('mode');

        switch ($mode) {
            case "get":
                return $this->get($request);
                break;
            case "add_user":
                return $this->addUser($request);

                break;
            case "get_users":
                return $this->getUsers();
                break;
            default:
                return response()->json(array('msg'=> "A keresett mód nem található"), 404);
        }
    }

    private function addUser(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        $input = $request->all();

        $user = User::create($input);
        $user = $this->getUserByID($user->id);

        return response()->json(array('msg'=> "success",'user' => $user), 200);
    }

    private function getUserByID($id){
        $user = User::GetUserByID($id);
        return $user;
    }

    private function getUsers(){
        $users = User::GetUsers();
        return response()->json(array('msg'=> "success",'users' => $users), 200);
    }

    private function get(Request $request) {
        if(!empty($request) && !empty($request->get("id"))){
            $this->todo_id = intval($request->get("id"));

            $todo = TODO::GetTodoByID($this->todo_id);
            $users = TODO::GetTodoUsers($this->todo_id);

            return response()->json(array('msg'=> "success",'todo' => $todo,'users' => $users), 200);
        }else{
            return response()->json(array('msg'=> "A keresett feladat nem található"), 404);
        }
    }
}
