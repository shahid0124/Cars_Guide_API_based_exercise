<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Mail;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $name;
    protected $email;
    protected $hash;
    public function __construct($name,$email,$hash)
    {
        $this->name = $name;
        $this->email = $email;
        $this->hash = $hash;
    }

    public static function sendAccountCreatedEmail($name,$email,$hash)
    {
        Mail::send(new AccountCreated($name,$email,$hash));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.account_created',['name'=>$this->name,'hash'=>$this->hash])->to($this->email)->from('javed.shahid1@yahoo.com')->subject('Verify your email address');
    }
}
