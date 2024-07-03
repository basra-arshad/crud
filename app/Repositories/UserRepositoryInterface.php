<?php

namespace App\Repositories;

interface UserRepositoryInterface
{


    public function get_all();

    public function store(array $data);
    public function edit($id);
    public function update(array $data,$id);




}