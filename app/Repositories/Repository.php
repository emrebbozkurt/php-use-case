<?php

namespace App\Repositories;

interface Repository
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function destroy($id);
}
