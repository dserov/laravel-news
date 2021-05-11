<?php

namespace App\Jobs;

use App\Http\Services\NewsParserService;
use App\Services\RssProcess;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $source;

    /**
     * Create a new job instance.
     *
     * @param string $source
     */
    public function __construct(string $source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(NewsParserService $newsParserService)
    {
        $newsParserService->update($this->source);
    }
}
