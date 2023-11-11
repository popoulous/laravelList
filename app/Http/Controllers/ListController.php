<?php

namespace App\Http\Controllers;

use App\Models\TODO;
use Illuminate\Http\Request;

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

        return View("todo" , ["todos" => $todos]);
    }
}
