<?php

namespace NetLinker\HighSender\Sections\SmtpAccounts\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use NetLinker\HighSender\Sections\SmtpAccounts\Models\SmtpAccount;
use AwesIO\Repository\Eloquent\BaseRepository;
use NetLinker\HighSender\Sections\SmtpAccounts\Scopes\SmtpAccountScopes;

class SmtpAccountRepository extends BaseRepository
{
    protected $searchable = [

    ];

    public function entity()
    {
        return SmtpAccount::class;
    }

    public function scope($request)
    {
        // apply build-in scopes
        parent::scope($request);

        // apply custom scopes
        $this->entity = (new SmtpAccountScopes($request))->scope($this->entity);

        return $this;
    }

    public function scopeOwner()
    {
        $fieldUuid = config('high-sender.owner.field_auth_user_owner_uuid');
        $ownerUuid = Auth::user()->$fieldUuid;

        $this->entity = $this->entity->where('owner_uuid', $ownerUuid);

        return $this;
    }

    /**
     * Delete a record by id.
     *
     * @param  int  $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $results = $this->entity->where('id', $id)->delete();

        $this->reset();

        return $results;
    }

}
