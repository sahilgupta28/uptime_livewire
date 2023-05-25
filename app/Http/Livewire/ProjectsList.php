<?php

namespace App\Http\Livewire;

use App\Interfaces\ProjectInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class ProjectsList extends Component
{
    public Collection $projects;
    protected ProjectInterface $project_repostory;

    public function boot(ProjectInterface $project_repostory): void
    {
        $this->project_repostory = $project_repostory;
        $this->projects = $this->project_repostory->getAllWithCurrentStatus();
    }

    public function render(): View
    {
        return view('livewire.projects-list');
    }

    public function delete(int $project_id): void
    {
        $this->project_repostory->delete($project_id);
        $this->projects = $this->project_repostory->getAllWithCurrentStatus();
    }

    public function edit(int $project_id): RedirectResponse|Redirector
    {
        return redirect(route('project.edit', ['id' => $project_id]));
    }
}
