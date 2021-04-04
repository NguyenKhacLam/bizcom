<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class CreateAccount extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tries=3;

    public $user;
    public $password;
    public $name;
    public $email;
    public $subject;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password,$subject)
    {
        $this->name = $user->first_name.' '.$user->last_name;
        $this->email = $user->email;
        $this->password = $password;
        $this->user = $user;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
            ->subject($this->subject)
            ->with([
                'name' =>$this->name,
                'email' =>$this->email,
                'password' =>$this->password,
            ])
            ->markdown('mails.authen.create_account');
    }
}
