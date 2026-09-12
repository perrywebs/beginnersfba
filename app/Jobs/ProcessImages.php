<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $images;

    /**
     * Create a new job instance.
     */
    public function __construct(array $images)
    {
        $this->images = $images;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->images as $imagePath) {
            $this->processImage($imagePath);
        }
    }

    /**
     * Process an individual image.
     *
     * @param string $imagePath
     * @return void
     */
    protected function processImage($imagePath)
    {
        $image = (object) $imagePath;

        // Example: Resize the image to a width of 300 and constrain aspect ratio (auto height)
        $image->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Example: Save the processed image to a new location
        $image->store('giftcard','public');
    }
}
