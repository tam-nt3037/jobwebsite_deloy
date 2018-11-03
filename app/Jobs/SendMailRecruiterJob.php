<?php

namespace App\Jobs;

use App\Mail\SendEmailRecruiterMailable;
use App\Model\Account_Recruiter;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class SendMailRecruiterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $acc_recruiter = Account_Recruiter::find(Request::input('id_account_recruiter'));
        $email_recruiter = $acc_recruiter->email;
        Mail::to($email_recruiter)
            ->send(new SendEmailRecruiterMailable());
    }
}
