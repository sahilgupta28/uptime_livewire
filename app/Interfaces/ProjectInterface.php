<?php

namespace App\Interfaces;

use App\Models\Project;

interface ProjectInterface
{
    public function create(array $inputs): Project;
}
