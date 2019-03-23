<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::select('id', 'title')
            ->with('people')->paginate();

        return view('department.index')->withDepartments($departments);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $department = Department::create([
            'title' => $request->title,
        ]);

        return redirect(route('department.index'))
            ->with('success', 'Отдел успешно создан');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('department.edit')->withDepartment($department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $department = Department::findOrFail($id);
        $department->title = $request->title;
        $department->save();

        return redirect(route('department.index'))
            ->with('success', 'Отдел успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        if($department->people_count===0){
            $department->delete();
            return redirect(route('department.index'))->with('success',
                'Отдел удален');
        } else{
            return back()->with('error', 'Невозможно удалить, в отделе есть сотрудники');
        }


    }
}
