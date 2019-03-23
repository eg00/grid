<?php

namespace App\Http\Controllers;

use App\Department;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::select('id', 'first_name', 'last_name', 'middle_name',
            'gender', 'salary')
            ->with('departments')
            ->paginate();

        return view('person.index', compact('people'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::select('id', 'title')->get();

        return view('person.create', compact('departments'));
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
            'firstName'   => ['required', 'regex:/[А-Яа-яЁё]/u'],
            'lastName'    => ['required', 'regex:/[А-Яа-яЁё]/u'],
            'middleName'  => ['nullable', 'regex:/[А-Яа-яЁё]/u'],
            'gender'      => 'required',
            'salary'      => 'integer',
            'departments' => 'required',
        ]);

        $person = Person::create([
            'first_name'  => $request->firstName,
            'last_name'   => $request->lastName,
            'middle_name' => $request->middleName,
            'gender'      => $request->gender,
            'salary'      => $request->salary,
        ]);

        $person->memberships()->attach(array_values($request->departments));

        return redirect(route('person.index'))
            ->with('success', 'Сотрудник создан');


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
        $person = Person::with('departments')->findOrFail($id);
        $departments = Department::select('id', 'title')->get();

        return view('person.edit', compact('person', 'departments'));
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
            'firstName'   => ['required', 'regex:/[А-Яа-яЁё]/u'],
            'lastName'    => ['required', 'regex:/[А-Яа-яЁё]/u'],
            'middleName'  => ['nullable', 'regex:/[А-Яа-яЁё]/u'],
            'salary'      => 'integer',
            'departments' => 'required',
        ]);

        $person = Person::findOrFail($id);
        $person->first_name = $request->firstName;
        $person->last_name = $request->lastName;
        $person->middle_name = $request->middleName;
        $person->gender = $request->gender;
        $person->salary = $request->salary;
        $person->save();

        $person->memberships()->sync(array_values($request->departments));


        return redirect(route('person.index'))
            ->with('success', 'Данные сотрудника обновлены');


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
        $person = Person::findOrFail($id);
        $person->delete();

        return redirect(route('person.index'))->with('success',
            'Сотрудник удален');
    }
}
