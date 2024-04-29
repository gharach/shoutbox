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
        $messageExpirationDuration  = env("MESSAGE_EXPIRATION_TIME_MINUTES");
        $cutoffDate = Carbon::now()->subMinutes($messageExpirationDuration);
        // Retrieve messages older than the cutoff date
        $deletedMessages = Message::where('created_at', '<', $cutoffDate)->get();

        foreach ($deletedMessages as $message) {
            // Construct the paths to the image and its thumbnail
            if ($message->image) {
                $thumbnailPath = public_path($message->image);
                $imagePath = str_replace('thumbnail/', '', $thumbnailPath);

                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the original picture
                }

                if (file_exists($thumbnailPath)) {
                    unlink($thumbnailPath); // Delete the thumbnail
                }
            }
            // Delete the message record from the database
            $message->delete();
        }

        $this->info(count($deletedMessages) . " outdated messages and associated images deleted successfully.");

    }
}
