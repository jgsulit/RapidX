<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UserCreatedMail extends Mailable
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
        // $e_subject = $this->subject;
        // $e_message = $this->message;
        // $e_password = $this->password;
        // $e_username = $this->username;
        // $e_attachment = public_path('storage/design/pricon_logo1.png');
        // $e_attachment_info = pathinfo($e_attachment);

        // return $this->view('mail.user_created_mail', compact(['e_message', 'e_password', 'e_username']))
        //         ->subject($e_subject)
        //         ->attach($e_attachment, [
        //             'as' => $e_attachment_info['filename'] . '.' . $e_attachment_info['extension'],
        //             'mime' => $e_attachment_info['extension'],
        //         ]);

        $e_subject = $this->subject;
        $e_message = $this->message;
        $e_password = $this->password;
        $e_username = $this->username;

        return $this->view('mail.user_created_mail', compact(['e_message', 'e_password', 'e_username']))
                ->subject($e_subject);
    }
}
