<?php
namespace App\Repository;

interface StudentRepositoryInterface{
    public function all();

    public function save(array $data);

    public function find($id);
}