<?php

namespace App\Interfaces;

/**
 * Interface BookRepositoryInterface
 * @package App\Interfaces
 */
interface BookRepositoryInterface
{
    public function index();

    public function show($id);

    public function store($data);

    public function update($data, $id);

    public function delete($id);

}
