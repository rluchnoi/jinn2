<?php

namespace App\Http\Services;

use App\Jobs\VideoUploadJob;
use App\Models\Film;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FilmFileUploadService
{
    /**
     * Storage prefixes
     */
    private string $imagePrefix;
    private string $videoPrefix;

    /**
     * Constructor
     */
    public function __construct() {
        $this->imagePrefix = config('filesystems.disks.images.url_short');
        $this->videoPrefix = config('filesystems.disks.videos.url_short');
    }

    /**
     * Image upload
     */
    public function uploadImage(UploadedFile $image, Film $film): void
    {
        $name = Storage::disk('images')->put('', $image);

        $film->image = $this->imagePrefix.'/'.$name;
    }

    /**
     * Video upload
     */
    public function uploadVideo(UploadedFile $video, Film $film)
    {
        $name = Storage::disk('videos')->put('tmp', $video);
        $user = auth()->user();

        VideoUploadJob::dispatch(
            mp4FileName:   $name, 
            film:          $film, 
            storagePrefix: $this->videoPrefix,
            user:          $user
        );
    }
}
