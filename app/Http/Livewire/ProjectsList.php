<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ProjectsList extends Component
{
    public Collection $projects;

    public function mount(): void
    {
        $this->projects = $this->getAllRecords();
    }

    public function render(): View
    {
        return view('livewire.projects-list');
    }

    public function delete(int $project_id): void
    {
        Project::whereId($project_id)
            ->delete();
        $this->projects = $this->getAllRecords();
    }

    private function getAllRecords(): Collection
    {
        return Project::latest()
            ->with('uptimeLogsLatestFirst')
            ->get();
    }
}
