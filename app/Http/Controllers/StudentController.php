<?php

namespace App\Http\Controllers;

use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $repository;

    private $page = "admin.student.";

    private $redirectTo = "admin.student.index";

    public function __construct(StudentRepositoryInterface $repository){
        $this->repository = $repository;
    }
    public function index()
    {
        $students = $this->repository->all();
        return view($this->page."index", compact('students'))->with("id");
    } 

    public function create()
    {
        return view($this->page."create");
    }

    public function store(Request $request)
    {
        $input = $request->except("_token");
        $this->repository->save($input);
        return response()->json(["msg" => "Student created successfully", "redirectRoute" => route($this->redirectTo)]);
        // return redirect()->route('student.index')->with("message", "Student created successfully");
    }

    public function edit($id)
    {
        $student = $this->repository->find($id);
        return view($this->page."edit",compact("student"));
    }

    public function update(Request $request, $id)
    {
        $this->repository->updateStudent($request, $id);
        return response()->json(["msg" => "Student updated successfully", "redirectRoute" => route($this->redirectTo)]);
    }
}
