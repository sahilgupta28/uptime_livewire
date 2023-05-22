<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('project.index');
    }

    public function create(): View
    {
        return view('project.create');
    }

    public function edit(int $id): View
    {
        return view('project.edit')->with('id', $id);
    }
}
