<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\User;
use App\Mail\DailyTopPostsDigest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendDailyTopPostsDigest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:daily-top-posts-digest';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a daily email digest of the top posts to all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('SendDailyTopPostsDigest command started.');

        try {
            // Get top 5 posts by views
            $topPosts = Post::orderBy('views', 'desc')->take(5)->get();
            Log::info('Top posts retrieved.', ['topPosts' => $topPosts]);

            // Get all users
            $users = User::all();
            Log::info('Users retrieved.', ['users' => $users]);

            foreach ($users as $user) {
                Mail::to($user->email)->send(new DailyTopPostsDigest($topPosts));
                Log::info('Email sent to user.', ['user' => $user]);
            }

            $this->info('Daily top posts digest sent successfully.');
            Log::info('SendDailyTopPostsDigest command completed successfully.');
        } catch (\Exception $e) {
            Log::error('Error in SendDailyTopPostsDigest command.', ['exception' => $e]);
            $this->error('Error sending daily top posts digest: ' . $e->getMessage());
        }
    }
}
