<?php

namespace App\Http\Livewire;

use App\Jobs\CheckUptime;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class EditProjectForm extends Component
{
    public String $project_name;
    public String $url;
    public int $project_id;

    protected array $rules = [
        'project_name' => 'required|string|min:3',
        'url' => 'required|url'
    ];

    public function mount($project_id): void
    {
        $project = Project::whereId($project_id)->first();
        $this->project_name = $project->name;
        $this->url = $project->url;
        $this->project_id = $project->id;
    }

    public function render(): View
    {
        return view('livewire.edit-project-form');
    }

    public function upadte(): ?Redirect
    {
        $data = $this->validate();
        Project::whereId($this->project_id)
            ->update(
                [
                    'name' => $data['project_name'],
                    'url' => $data['url']
                ]
            );
        CheckUptime::dispatch();
        return $this->redirect(route('project.index'));
    }
}
