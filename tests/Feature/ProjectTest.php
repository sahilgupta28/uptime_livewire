<?php

use App\Models\User;

test('project create page is displayed', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('project.create'));

    $response->assertOk();
});

test('project index page is displayed', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('project.index'));

    $response->assertOk();
});

test('project create form save', function () {
    Livewire::test('create-project-form')
        ->set('project_name', '')
        ->set('url', '')
        ->assertHasErrors([
            'project_name',
            'url'
        ]);

    Livewire::test('create-project-form')
        ->assertOk();
});
