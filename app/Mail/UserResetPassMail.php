<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class UserResetPassMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $subject;
    public $message;
    public $username;
    public $password;

    public function __construct($subject, $message, $username, $password)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->subject;
        $e_message = $this->message;
        $e_password = $this->password;
        $e_username = $this->username;

        // return $this->view('mail.user_reset_pass_mail', compact(['e_message', 'e_password', 'e_username']))
        //         ->subject($e_subject);

        $user_info = User::where('username', $e_username)->first();

        return $this->view('mail.user.new_user', compact(['e_message', 'e_password', 'e_username', 'user_info']))
                ->subject($e_subject);
    }
}
