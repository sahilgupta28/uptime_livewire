<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Notifications\DailyStatusNotification;
use Illuminate\Console\Command;

class DailyStatusCommand extends Command
{
    protected $signature = 'report:daily';

    protected $description = "It'll generate daily status reports";

    private Project $project;

    public function __construct(Project $project)
    {
        parent::__construct();
        $this->project = $project;
    }

    public function handle(): void
    {
        $projects = $this->project->latest()
        ->with('uptimeLogsLatestFirst')
        ->orderBy('name')
        ->get();
        $bar = $this->output->createProgressBar(count($projects));
        $bar->start();
        foreach ($projects as $project) {
            $project->notify(new DailyStatusNotification());
            $bar->advance();
        }
        $bar->finish();
    }
}
