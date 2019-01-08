<?php

namespace App\Mail;

use App\Invite;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $invite;
    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
    }

    public function build()
    {
        return $this->from('peternellmarc@gmail.com')
            ->view('emails.invite');
    }
}
