<?php

namespace App\Http\Controllers;

use App\Models\TODO;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){

        $todos = TODO::GetTodos();

        return View("todos" , ["todos" => $todos]);
    }
}
