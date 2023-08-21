<?php

namespace App\Jobs\Email;


use App\Models\PrbsCandidate;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\PrbsCandidate\PrbsCandidateMail;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendPrbsCandidateMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public PrbsCandidate $candidate)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::send(new PrbsCandidateMail($this->candidate));
    }
}
