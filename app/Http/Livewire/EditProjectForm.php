<?php

namespace App\Http\Livewire;

use App\Interfaces\ProjectInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class EditProjectForm extends Component
{
    public String $project_name;
    public String $url;
    public int $project_id;
    protected ProjectInterface $project_repostory;

    protected array $rules = [
        'project_name' => 'required|string|min:3',
        'url' => 'required|url'
    ];

    public function boot(ProjectInterface $project_repostory): void
    {
        $this->project_repostory = $project_repostory;
    }

    public function mount($project_id): void
    {
        $project = $this->project_repostory->first($project_id);
        $this->project_name = $project->name;
        $this->url = $project->url;
        $this->project_id = $project->id;
    }

    public function render(): View
    {
        return view('livewire.edit-project-form');
    }

    public function update(): ?Redirect
    {
        $data = $this->validate();
        $this->project_repostory->update(
            $this->project_id,
            [
                'name' => $data['project_name'],
                'url' => $data['url']
            ]
        );
        return $this->redirect(route('project.index'));
    }
}
