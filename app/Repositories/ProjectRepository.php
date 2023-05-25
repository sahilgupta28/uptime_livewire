<?php

namespace App\Repositories;

use App\Interfaces\ProjectInterface;
use App\Jobs\CheckUptime;
use App\Models\Project;

class ProjectRepository implements ProjectInterface
{
    public function __construct(
        public Project $project = new Project()
    ) {
    }

    public function createProject(array $inputs): Project
    {
        $project = $this->project->create($inputs);
        CheckUptime::dispatch();
        return $project;
    }
}
