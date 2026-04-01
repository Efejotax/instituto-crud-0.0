<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        $students= Student::all();
        return view('students.index', compact('students'));

    }*/
    public function index(int $page = 1)
    {
        //dd($page);
        //$students = Student::all();

        $students = Student::Paginate(5);
        $campos = Student::getLabels();

        return view('students.index', compact('students', 'campos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $datos = $request->input();
        Student::create($datos);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $page = request()->get('page');
        return view('students.edit', compact('student', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $datos = $request->input();
        $student->update($datos);
        $page = request()->get('page');
        //return redirect()->route('teachers.index', ['page' => $page]);
        return redirect()->route('students.index', compact('student', 'page'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $page = request()->get('page');
        $lastpage = Student::paginate()->lastPage();
        if ($page > $lastpage) {
            $page--;
        }
        $student->delete();
        return redirect()->route('students.index', ['page' => $page]);
    }
}
