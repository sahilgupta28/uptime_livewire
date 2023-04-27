<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class CreateProjectForm extends Component
{
    public string $project_name = '';
    public string $url = '';
    public function render()
    {
        return view('livewire.create-project-form');
    }

    public function save()
    {
        $data = $this->validate([
            'project_name' => 'required|string|min:3',
            'url' => 'required|url'
        ]);
        Project::create(
            [
                'name' => $data['project_name'],
                'url' => $data['url'],
                'user_id' => auth()->user()->id
            ]
        );
        $this->project_name = '';
        $this->url = '';
    }
}
