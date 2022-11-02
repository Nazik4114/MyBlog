<?php

namespace App\Jobs;

use App\Contracts\ResizeImageContract;
use App\Services\SaveImageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessDownloadImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $api_key;

    protected $resize_api_key;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $api_key, string $resize_api_key)
    {
        $this->api_key=$api_key;
        $this->resize_api_key=$resize_api_key;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle(SaveImageService $save, ResizeImageContract $resize)
    {
        $save->setKey($this->api_key);
        $save->saveContent($save->getContent());
        $resize($this->resize_api_key);
    }
}
