<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class CreateProjectForm extends Component
{
    public string $project_name = '';
    public string $url = '';
    public function render()
    {
        return view('livewire.create-project-form');
    }

    public function save(): ?RedirectResponse
    {
        $data = $this->valiadtion();
        Project::create(
            [
                'name' => $data['project_name'],
                'url' => $data['url'],
                'user_id' => optional(auth()->user())->id
            ]
        );
        return $this->redirect(route('project.index'));
    }

    private function valiadtion(): array
    {
        return $this->validate([
            'project_name' => 'required|string|min:3',
            'url' => 'required|url'
        ]);
    }
}
