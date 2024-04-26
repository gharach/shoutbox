<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Message;
use Carbon\Carbon;

class DeleteOutdatedMessages extends Command
{
    protected $signature = 'messages:delete-outdated';
    protected $description = 'Delete outdated messages';

    public function handle()
    {
        //$cutoffDate = Carbon::now()->subDays(1);
        $cutoffDate = Carbon::now()->subMinutes(1);
        // Delete messages older than the cutoff date
        $deletedCount = Message::where('created_at', '<', $cutoffDate)->delete();

        $this->info("$deletedCount outdated messages deleted successfully.");
    }
}
