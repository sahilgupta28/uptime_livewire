<?php

namespace App\Interfaces;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

interface ProjectInterface
{
    public function create(array $inputs): Project;

    public function first(int $id): ?Project;

    public function update(int $id, array $inputs): int;

    public function getAllWithCurrentStatus(): Collection;

    public function delete(int $id): bool;
}
