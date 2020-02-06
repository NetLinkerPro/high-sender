<?php


namespace NetLinker\HighSender\Mailables;


use Illuminate\Bus\Queueable;
use Illuminate\Container\Container;
use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use NetLinker\HighSender\Sections\SmtpAccounts\Repositories\SmtpAccountRepository;
use Swift_Mailer;
use Swift_SmtpTransport;

class SmtpMailable extends Mailable
{

    use Queueable, SerializesModels;

    protected $smtpAccountId;

    /**
     * Constructor
     *
     * @param $smtpAccountId
     */
    public function __construct($smtpAccountId)
    {
        $this->smtpAccountId = $smtpAccountId;
    }

    /**
     * Send the message using the given mailer.
     *
     * @param  \Illuminate\Contracts\Mail\Mailer  $mailer
     * @return void
     */
    public function send(MailerContract $mailer)
    {
        $smtpAccount = $this->getSmtpAccount();

        $transport = new Swift_SmtpTransport($smtpAccount->host, $smtpAccount->port, $smtpAccount->encryption);
        $transport->setUsername($smtpAccount->username);
        $transport->setPassword($smtpAccount->password);

        $mailer->setSwiftMailer(new Swift_Mailer($transport));

        return $this->withLocale($this->locale, function () use ($mailer) {
            Container::getInstance()->call([$this, 'build']);

            return $mailer->send($this->buildView(), $this->buildViewData(), function ($message) {
                $this->buildFrom($message)
                    ->buildRecipients($message)
                    ->buildSubject($message)
                    ->runCallbacks($message)
                    ->buildAttachments($message);
            });
        });
    }

    /**
     * Get SMTP account
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|SmtpAccountRepository|SmtpAccountRepository[]
     */
    protected function getSmtpAccount()
    {
        return (new SmtpAccountRepository())->scopeOwner()->findOrFail($this->smtpAccountId);
    }


}