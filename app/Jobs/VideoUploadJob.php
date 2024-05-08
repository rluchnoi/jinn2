<?php

namespace App\Jobs;

use App\Mail\FilmUploadedMail;
use App\Models\Film;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Process\Process;
use Illuminate\Support\Str;
use Symfony\Component\Process\Exception\ProcessFailedException;

class VideoUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Log prefix
     */
    private string $logPrefix = 'Video Upload |';

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 3600;

    /**
     * Constructor
     */
    public function __construct(
        private string $mp4FileName, 
        private Film $film, 
        private string $storagePrefix,
        private User $user
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->performVideoActions();
        $this->performNotifyActions();
    }

    /**
     * Perform video related actions
     */
    private function performVideoActions(): void
    {
        $directory = $this->createDirectory();

        $this->generateM3U8Files($directory);
        $this->copyIndexFile($directory);
        $this->deleteMP4File();

        $this->film->video = $this->storagePrefix.'/'.$directory.'/index.m3u8';
        $this->film->save();
    }

    /**
     * Perform notify actions after upload
     */
    private function performNotifyActions(): void
    {
        Mail::to($this->user)->send(new FilmUploadedMail($this->film));
    }

    /**
     * Create the new video files directory
     */
    private function createDirectory(): string
    {
        $directory = Str::random(20);

        $process = new Process(['mkdir', $directory]);
        $process->setWorkingDirectory('/var/www/html/storage/app/public/videos');
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        Log::info("$this->logPrefix Directory $directory created");

        return $directory;
    }

    /**
     * Delete the mp4 file
     */
    private function deleteMP4File(): void
    {
        $process = new Process(['rm', $this->mp4FileName]);
        $process->setWorkingDirectory("/var/www/html/storage/app/public/videos");
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        Log::info("$this->logPrefix mp4 file $this->mp4FileName deleted");
    }

    /**
     * Generate streaming files
     */
    private function generateM3U8Files(string $directory): void
    {
        $process1 = new Process(['ffmpeg', '-i', "$this->mp4FileName", '-profile:v', 'baseline', '-level', '3.0', '-s', '640x360', '-start_number', '0', '-hls_time', '10', '-hls_list_size', '0', '-f', 'hls', "$directory/360_video.m3u8"]);
        $process1->setWorkingDirectory("/var/www/html/storage/app/public/videos");
        $process1->setTimeout($this->timeout);
        $process1->run();

        if (!$process1->isSuccessful()) {
            throw new ProcessFailedException($process1);
        }

        $process2 = new Process(['ffmpeg', '-i', "$this->mp4FileName", '-profile:v', 'baseline', '-level', '3.0', '-s', '1280x720', '-start_number', '0', '-hls_time', '10', '-hls_list_size', '0', '-f', 'hls', "$directory/720_video.m3u8"]);
        $process2->setWorkingDirectory("/var/www/html/storage/app/public/videos");
        $process2->setTimeout($this->timeout);
        $process2->run();

        if (!$process2->isSuccessful()) {
            throw new ProcessFailedException($process2);
        }

        $process3 = new Process(['ffmpeg', '-i', "$this->mp4FileName", '-profile:v', 'baseline', '-level', '3.0', '-s', '1920x1080', '-start_number', '0', '-hls_time', '10', '-hls_list_size', '0', '-f', 'hls', "$directory/1080_video.m3u8"]);
        $process3->setWorkingDirectory("/var/www/html/storage/app/public/videos");
        $process3->setTimeout($this->timeout);
        $process3->run();

        if (!$process3->isSuccessful()) {
            throw new ProcessFailedException($process3);
        }

        Log::info("$this->logPrefix m3u8 files generated");
    }

    /**
     * Copy the template index file to the generated directory
     */
    private function copyIndexFile(string $directory): void
    {
        $process = new Process(['cp', 'index.m3u8', $directory]);
        $process->setWorkingDirectory('/var/www/html/storage/app/public/videos');
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        Log::info("$this->logPrefix index file copied");
    }
}
