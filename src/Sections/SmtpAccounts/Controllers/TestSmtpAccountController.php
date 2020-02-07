<?php

namespace NetLinker\HighSender\Sections\SmtpAccounts\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use NetLinker\HighSender\Sections\SmtpAccounts\Repositories\TestSmtpAccountRepository;
use NetLinker\HighSender\Sections\SmtpAccounts\Requests\SentTestSmtpAccount;
use NetLinker\HighSender\Sections\SmtpAccounts\Requests\StoreSmtpAccount;
use NetLinker\HighSender\Sections\SmtpAccounts\Resources\SmtpAccount;
use NetLinker\HighSender\Sections\SmtpAccounts\Repositories\SmtpAccountRepository;

class TestSmtpAccountController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** @var TestSmtpAccountRepository $testSmtpAccounts */
    protected $testSmtpAccounts;

    /**
     * Constructor
     *
     * @param TestSmtpAccountRepository $testSmtpAccounts
     */
    public function __construct(TestSmtpAccountRepository $testSmtpAccounts)
    {
        $this->testSmtpAccounts = $testSmtpAccounts;
    }

    /**
     * Request sent
     *
     * @param SentTestSmtpAccount $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sent(SentTestSmtpAccount $request)
    {
        $this->testSmtpAccounts->sentEmail($request->id, $request->email_to);
       return notify(__('high-sender::smtp-accounts.email_was_successfully_send'));
    }
}
