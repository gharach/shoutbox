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
        // Define the criteria for outdated messages (e.g., older than 7 days)
        $cutoffDate = Carbon::now()->subDays(7);

        // Delete messages older than the cutoff date
        Message::where('created_at', '<', $cutoffDate)->delete();

        $this->info('Outdated messages deleted successfully.');
    }
}
