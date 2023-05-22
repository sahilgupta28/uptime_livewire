<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'url',
        'user_id'
    ];

    public function uptimeLogs(): HasMany
    {
        return $this->hasMany(UptimeLog::class, 'project_id', 'id');
    }

    public function uptimeLogsLatestFirst(): HasOne
    {
        return $this->HasOne(UptimeLog::class, 'project_id', 'id')->latest();
    }

    public function routeNotificationForSlack(): string
    {
        return env('SLACK_HOOK');
    }
}
