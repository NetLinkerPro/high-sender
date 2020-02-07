<?php

namespace NetLinker\HighSender\Sections\SmtpAccounts\Mails;


use NetLinker\HighSender\Mailables\SmtpMailable;

class SentTest extends SmtpMailable
{

    /**
     * Create a new message instance.
     *
     * @param $smtpAccountId
     */
    public function __construct($smtpAccountId)
    {
        parent::__construct($smtpAccountId);
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $account = $this->getSmtpAccount();

        return $this->from($account->from_address, $account->from_name)
            ->replyTo($account->from_address, $account->from_name)
            ->subject('Test email')
            ->view('high-sender::sections.smtp-accounts.emails.test', ['account' => $account]);
    }
}
