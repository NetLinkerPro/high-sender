<?php

namespace NetLinker\HighSender\Sections\SmtpAccounts\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use NetLinker\HighSender\Sections\SmtpAccounts\Requests\StoreSmtpAccount;
use NetLinker\HighSender\Sections\SmtpAccounts\Resources\SmtpAccount;
use NetLinker\HighSender\Sections\SmtpAccounts\Repositories\SmtpAccountRepository;

class SmtpAccountController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
     * Request index
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('high-sender::sections.smtp_accounts.index', [
            'h1' => __('high-sender::smtp_accounts.smtp_accounts'),
            'accounts' => $this->scope($request)->response()->getData()
        ]);
    }

    /**
     * Request scope
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function scope(Request $request)
    {
        return SmtpAccount::collection(
            $this->smtpAccounts->scope($request)
                ->scopeOwner()
                ->latest()->smartPaginate()
        );
    }

    /**
     * Request store
     *
     * @param StoreSmtpAccount $request
     * @return array
     */
    public function store(StoreSmtpAccount $request)
    {
        $this->smtpAccounts->create($request->all());

        return notify(__('high-sender::smtp_accounts.new_account_was_successfully_added'));
    }

    /**
     * Update
     *
     * @param StoreSmtpAccount $request
     * @param $id
     * @return array
     */
    public function update(StoreSmtpAccount $request, $id)
    {
        $this->smtpAccounts->scopeOwner()->update($request->all(), $id);

        return notify(
            __('high-sender::accounts.account_was_successfully_updated'),
            new SmtpAccount($this->smtpAccounts->find($id))
        );
    }

    /**
     * Destroy
     *
     * @param StoreSmtpAccount $request
     * @param $id
     * @return array
     */
    public function destroy(Request $request, $id)
    {
        $this->smtpAccounts->scopeOwner()->destroy($id);

        return notify(__('high-sender::smtp_accounts.account_was_successfully_deleted'));
    }
}
