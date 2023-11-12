<?php

namespace App\Http\Controllers;

use App\Models\TODO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ListController extends Controller
{
    private $pageSettings = array(
        "perpage" => 10,
        "page" => 1,
        "sort" => "DESC",
        "status" => "",
    );
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){

        if(!empty($request)){
            foreach ($this->pageSettings as $settingName => $settingVal){
                $this->pageSettings[$settingName] = !empty($request->get($settingName)) ? $request->get($settingName) : $this->pageSettings[$settingName];
            }
        }



        $todos = TODO::GetTodos($this->pageSettings);
        $alltodoscount = TODO::GetAllTodosCount();

        $this->pageSettings["pagescount"] = ceil($alltodoscount/(int)$this->pageSettings["perpage"]);

        return View("layouts.todo" , ["todos" => $todos,"pagedata" => $this->pageSettings]);
    }


    public function store(Request $request)

    {
        $input = $request->all();

        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
            'description' => 'required|string|min:2|max:750'
        ]);

        $todo = TODO::create($input);

        if(!empty($input["assigned_users"])){
            $users = explode(",",$input["assigned_users"]);

            foreach ($users as $userid){
                TODO::AddTodoUser($todo->id,$userid);
            }

        }

        return redirect()->to('/todo?id='.$todo->id);

    }

    public function delete(Request $request)

    {
        $input = $request->all();

        $request->validate([
            'id' => 'required'
        ]);

        $todo = TODO::DeleteTodo($input);


        return redirect()->to('/');

    }

    public function edit(Request $request)

    {
        $input = $request->all();

        $request->validate([
            'id' => 'required',
            'name' => 'required|max:255',
            'status' => 'required',
            'description' => 'required|string|min:2|max:750'
        ]);

        $id = 0;
        foreach ($input as $key => $value){
            if($key == "id"){
                $id = intval($value);
                break;
            }
        }

        $todo = TODO::find($id);
        $todo->name = $request->input('name');
        $todo->status = $request->input('status');
        $todo->description = $request->input('description');
        $todo->update();


        return redirect()->to('/todo?id='.$todo->id);

    }
}
