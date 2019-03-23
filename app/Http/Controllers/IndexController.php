<?php

namespace App\Http\Controllers;

use App\Department;
use App\Person;

class IndexController extends Controller
{
    public function __invoke()
    {
     $people = Person::select('id','first_name', 'last_name', 'middle_name')
         ->with('departments')
         ->get();
     $departments = Department::select('id','title')->get();
     return view('index', compact('people', 'departments'));
    }
}
