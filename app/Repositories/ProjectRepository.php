<?php

namespace App\Repositories;

use App\Interfaces\ProjectInterface;
use App\Jobs\CheckUptime;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository implements ProjectInterface
{
    public function __construct(
        public Project $project = new Project()
    ) {
    }

    public function create(array $inputs): Project
    {
        $project = $this->project->create($inputs);
        CheckUptime::dispatch();
        return $project;
    }

    public function first(int $id): ?Project
    {
        return $this->project->whereId($id)->first();
    }

    public function update(int $id, array $inputs): int
    {
        $project = $this->project
            ->whereId($id)
            ->update($inputs);
        CheckUptime::dispatch();
        return $project;
    }

    public function getAllWithCurrentStatus(): Collection
    {
        return $this->project
            ->with('uptimeLogsLatestFirst')
            ->orderBy('name')
            ->get();
    }

    public function delete(int $id): bool
    {
        return $this->project
            ->whereId($id)
            ->delete();
    }
}
