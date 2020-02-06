<?php

namespace NetLinker\HighSender\Sections\SmtpAccounts\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use NetLinker\HighSender\Sections\SmtpAccounts\Mails\SentTest;
use NetLinker\HighSender\Sections\SmtpAccounts\Models\SmtpAccount;
use AwesIO\Repository\Eloquent\BaseRepository;
use NetLinker\HighSender\Sections\SmtpAccounts\Scopes\SmtpAccountScopes;

class TestSmtpAccountRepository
{

    /** @var SmtpAccountRepository $smtpAccounts */
    protected $smtpAccounts;

    /**
     * Constructor
     *
     * @param SmtpAccountRepository $smtpAccounts
     */
    public function __construct(SmtpAccountRepository $smtpAccounts)
    {
        $this->smtpAccounts = $smtpAccounts;
    }

    /**
     * Sent email test
     * @param $smtpAccountId
     * @param $emailTo
     */
    public function sentEmail($smtpAccountId, $emailTo){
        Mail::to($emailTo)->send(new SentTest($smtpAccountId));
    }

}
