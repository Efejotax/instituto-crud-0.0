<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(int $page=1){
        //dd($page);
        //$teachers = Teacher::all();

        $teachers = Teacher::Paginate(5);
        $campos = Teacher::getLabels();

        return view('teachers.index', compact('teachers', 'campos'));
    }

    public function create(){
        return view('teachers.create');
    }

    public function store(StoreTeacherRequest $request){
        $datos = $request->input();
        Teacher::create($datos);
        return redirect()->route('teachers.index');
    }

    public function show(Teacher $teacher){
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher){
       $page = request()->get('page');
       return view('teachers.edit', compact('teacher', 'page'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher){
        $datos = $request->input();
        $teacher->update($datos);
        $page = request()->get('page');
        //return redirect()->route('teachers.index', ['page' => $page]);
        return redirect()->route('teachers.index', compact('teacher', 'page'));
    }

    public function destroy(Teacher $teacher){
        $page = request()->get('page');
        $lastpage = Teacher::paginate()->lastPage();
        if($page > $lastpage){
            $page--;
        }

        $teacher->delete();
        return redirect()->route('teachers.index', ['page' => $page]);
    }



}
