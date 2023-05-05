<?php

namespace App\Jobs;

use App\Components\Uptime;
use App\Models\Project;
use App\Models\UptimeLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckUptime implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    private Uptime $uptime;

    public function __construct()
    {
        $this->uptime = new Uptime();
    }

    public function handle(): void
    {
        $projects = Project::get();
        foreach ($projects as $project) {
            UptimeLog::create(
                [
                    'status' => $this->uptime->start($project->url),
                    'project_id' => $project->id
                ]
            );
        }
    }
}
