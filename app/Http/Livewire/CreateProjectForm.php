<?php

namespace App\Http\Livewire;

use App\Interfaces\ProjectInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CreateProjectForm extends Component
{
    public string $project_name = '';
    public string $url = '';
    protected ProjectInterface $project_repostory;

    protected array $rules = [
        'project_name' => 'required|string|min:3',
        'url' => 'required|url'
    ];

    public function boot(ProjectInterface $project_repostory): void
    {
        $this->project_repostory = $project_repostory;
    }

    public function render(): View
    {
        return view('livewire.create-project-form');
    }

    public function save(): ?Redirect
    {
        $data = $this->validate();
        $this->project_repostory->create(
            [
                'name' => $data['project_name'],
                'url' => $data['url'],
                'user_id' => optional(auth()->user())->id
            ]
        );
        return $this->redirect(route('project.index'));
    }

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }
}
