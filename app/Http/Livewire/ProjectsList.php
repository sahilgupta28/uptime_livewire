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
        $this->projects = Project::latest()
            ->with('uptimeLogsLatestFirst')
            ->get();
    }
    public function render(): View
    {
        return view('livewire.projects-list');
    }
}
