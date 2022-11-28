<?php

namespace App\Jobs;

use App\Mail\SendMail;
use App\Models\Contact;
use App\Models\Mailer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $theme = $this->details['template'];
        $mailer = Mailer::where('status','=', 1)->first();
        Log::warning($mailer);
        Config::set('mail.mailers.smtp.transport', $mailer->mail_driver);
        Config::set('mail.mailers.smtp.host', $mailer->mail_host);
        Config::set('mail.mailers.smtp.port', $mailer->mail_port);
        Config::set('mail.mailers.smtp.encryption', $mailer->mail_encryption);
        if($mailer->mail_driver == 'mailgun'){
            Config::set('services.mailgun.domain', $mailer->mail_username);
            Config::set('services.mailgun.secret', $mailer->mail_password);
            Log::warning(Config('mail.mailgun.domain'));
            Config::set('mail.mailers.smtp.username', 'nomanbutt8322@gmail.com');
            Config::set('mail.mailers.smtp.password', 'Pak@123123');
        }else{
            Config::set('mail.mailers.smtp.username', $mailer->mail_username);
            Config::set('mail.mailers.smtp.password', $mailer->mail_password);
        }
        Config::set('mail.from.address', $mailer->mail_from_address);


        $theme = new SendMail($theme);
        foreach ($this->details['check'] as $detail)
        {
            $contact = Contact::find($detail);
            Mail::to($contact->email)->send($theme);

        }

    }
}
