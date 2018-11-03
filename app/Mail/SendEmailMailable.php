<?php

namespace App\Mail;

use App\Model\Info_candidate;
use App\Model\Post_News;
use App\Model\Recruiter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class SendEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $id_account_recruiter = Request::input('id_account_recruiter');
        $id_post = Request::input('id_post');
        $id_candidate = auth()->user()->id;
        //Get info for send mail
        $recruiter = Recruiter::find($id_account_recruiter);
        $companyRecruiter = $recruiter->company_name;

        $post_news = Post_News::find($id_post);
        $jobTitle = $post_news->job_title;

        $info_candidate = Info_candidate::find($id_candidate);
        $full_name = $info_candidate->last_name. " " .$info_candidate->first_name;
        $file_name_cv = $info_candidate->cv;

        $data = [

            'email' => auth()->user()->email,
            'companyRecruiter' => $companyRecruiter,
            'jobTitle' => $jobTitle,
            'fullName' => $full_name,
            'path_cv' => Storage::url('cv/'.$file_name_cv),

        ];
        return $this->from('contact.shoestore@gmail.com','Job Website')
                    ->subject('You have just applied to '.$data['companyRecruiter'])
                    ->view('mail.mail')->with('data',$data);
    }
}
