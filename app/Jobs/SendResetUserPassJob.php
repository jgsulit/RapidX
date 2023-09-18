<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\UserResetPassMail;
use Mail;
use App\User;

class SendResetUserPassJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $subject;
    public $message;
    public $user_id;
    public $password;

    public function __construct($subject, $message, $user_id, $password)
    {
        //
        $this->subject = $subject;
        $this->message = $message;
        $this->user_id = $user_id;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        $user = User::where('id', $this->user_id)->get();

        $userResetPassMail = new UserResetPassMail($this->subject, $this->message, $user[0]->username, $this->password);

        Mail::to($user[0]->email)->send($userResetPassMail);
    }
}
