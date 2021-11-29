<?php

namespace App\Http\Controllers;

use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    private $repository;

    private $page = "admin.student.";

    private $redirectTo = "admin.student.index";

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $students = $this->repository->all();
        return view($this->page . "index", compact('students'))->with("id");
    }

    public function create()
    {
        return view($this->page . "create");
    }

    public function store(Request $request)
    {
        $validator = $this->__validation($request->all());
        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $input = $request->except("_token");
                $this->repository->save($input);
                DB::commit();
                return response()->json(["msg" => "Student created successfully", "redirectRoute" => route($this->redirectTo)]);
                // return redirect()->route('student.index')->with("message", "Student created successfully");
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(["db_error" => $e->getMessage()]);
            }
        }
    }

    public function edit($id)
    {
        $student = $this->repository->find($id);
        return view($this->page . "edit", compact("student"));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->__validation($request->all());
        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $this->repository->updateStudent($request, $id);
                DB::commit();
                return response()->json(["msg" => "Student updated successfully", "redirectRoute" => route($this->redirectTo)]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(["db_error" => $e->getMessage()]);
            }
        }
    }

    private function __validation(array $data)
    {
        return Validator::make($data, [
            "name" => ["required"],
            "class" => ["required"],
            "roll" => ["required"],
        ]);
    }
}
