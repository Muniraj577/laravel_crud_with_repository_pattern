<?php

namespace App\Repository\Student;
use App\Models\Student;

use App\Repository\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
    public function all()
    {
        return Student::all();
    }


    public function save(array $data)
    {
        return Student::create($data);
    }

    public function find($id)
    {
        return Student::findOrFail($id);
    }
}