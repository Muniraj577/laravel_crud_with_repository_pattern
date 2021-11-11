<?php

namespace App\Http\Controllers;

use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $repository;

    public function __construct(StudentRepositoryInterface $repository){
        $this->repository = $repository;
    }
    public function index()
    {
        $students = $this->repository->all();
        return view("student.index", compact('students'));
    } 

    public function create()
    {
        return view("student.create");
    }

    public function store(Request $request)
    {
        $input = $request->except("_token");
        $this->repository->save($input);
        return redirect()->route('student.index')->with("message", "Student created successfully");
    }
}
