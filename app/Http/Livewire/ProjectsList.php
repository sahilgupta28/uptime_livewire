<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectsList extends Component
{
    public $projects = '';
    public function mount()
    {
        $this->projects = Project::latest()->get();
    }
    public function render()
    {
        return view('livewire.projects-list');
    }
}
