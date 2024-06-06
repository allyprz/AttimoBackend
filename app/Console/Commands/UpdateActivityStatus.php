<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use App\Models\Activity;
use Carbon\Carbon;

class UpdateActivityStatus extends Command
{
    protected $signature = 'app:update-activity-status';
    protected $description = 'Update the status of activities based on their scheduled time';

    public function handle()
    {
        $now = Carbon::now();

        Log::info('UpdateActivityStatus command ran.');
        Log::info('Current time: ' . $now);

        // Update activities that are now in the past to inactive (status_activities_id = 2)
        Activity::where('scheduled_at', '<=', $now)
            ->where('status_activities_id', 1)
            ->update(['status_activities_id' => 2]);

        // Update activities that are now in the future to active (status_activities_id = 1)
        Activity::where('scheduled_at', '>', $now)
            ->where('status_activities_id', 2)
            ->update(['status_activities_id' => 1]);
    }
}
