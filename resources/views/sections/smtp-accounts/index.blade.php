@extends('high-sender::vendor.indigo-layout.main')

@section('meta_title', __('high-sender::smtp-accounts.meta_title')  . ' // ' . config('app.name'))
@section('meta_description', __('high-sender::smtp-accounts.meta_description'))

@push('head')
    @include('high-sender::integration.favicons')
    @include('high-sender::integration.ga')
@endpush

@section('create_button')
    <button class="frame__header-add" @click="AWES.emit('modal::form:open')"><i class="icon icon-plus"></i></button>
@endsection

@section('content')
       <div class="section">
        @table([
            'name' => 'smtp_accounts_table',
            'row_url'=> route('high-sender.smtp_accounts.index') . '/{id}',
            'scope_api_url' => route('high-sender.smtp_accounts.scope'),
            'scope_api_params' => ['']
        ])
        <template slot="header">
            <h3>{{__('high-sender::smtp-accounts.smtp_account_list') }}</h3>
        </template>
            <tb-column name="name" label="{{ __('high-sender::general.name') }}">
                <template slot-scope="col">
                    @{{ col.data.name }}
                </template>
            </tb-column>
            <tb-column name="host" label="{{ __('high-sender::smtp-accounts.host') }}">
                <template slot-scope="col">
                    @{{ col.data.host }}
                </template>
            </tb-column>
           <tb-column name="port" label="{{ __('high-sender::smtp-accounts.port') }}">
               <template slot-scope="col">
                   @{{ col.data.port }}
               </template>
           </tb-column>
           <tb-column name="username" label="{{ __('high-sender::smtp-accounts.username') }}">
               <template slot-scope="col">
                   @{{ col.data.username }}
               </template>
           </tb-column>
           <tb-column name="encryption" label="{{ __('high-sender::smtp-accounts.encryption') }}">
               <template slot-scope="col">
                   @{{ col.data.encryption }}
               </template>
           </tb-column>
           <tb-column name="from_name" label="{{ __('high-sender::smtp-accounts.from_name') }}">
               <template slot-scope="col">
                   @{{ col.data.from_name }}
               </template>
           </tb-column>
           <tb-column name="from_address" label="{{ __('high-sender::smtp-accounts.from_address') }}">
               <template slot-scope="col">
                   @{{ col.data.from_address }}
               </template>
           </tb-column>
            <tb-column name="">
                <template slot-scope="d">
                    <context-menu right boundary="table">
                        <button type="submit" slot="toggler" class="btn">
                            {{ __('high-sender::general.options') }}
                        </button>
                        <cm-button @click="AWES._store.commit('setData', {param: 'editAccount', data: d.data}); AWES.emit('modal::test-account:open')">
                            {{ __('high-sender::smtp-accounts.sent_test_email') }}
                        </cm-button>
                        <cm-button @click="AWES._store.commit('setData', {param: 'editAccount', data: d.data}); AWES.emit('modal::edit-account:open')">
                            {{ __('high-sender::general.edit') }}
                        </cm-button>
                        <cm-button @click="AWES._store.commit('setData', {param: 'deleteAccount', data: d.data}); AWES.emit('modal::delete-account:open')">
                            {{ __('high-sender::general.delete') }}
                        </cm-button>
                    </context-menu>
                </template>
            </tb-column>
        @endtable
    </div>
@endsection

@section('modals')

    {{--Test account--}}
    <modal-window name="test-account" class="modal_formbuilder" title="{{ __('high-sender::smtp-accounts.sent_test_email') }}">
        <form-builder method="POST" url="{{ route('high-sender.test_smtp_accounts.sent') }}" store-data="editAccount" @sended="AWES.emit('content::smtp-accounts_table:update')"
                      send-text="{{ __('high-sender::general.sent') }}"
                      cancel-text="{{ __('high-sender::general.cancel') }}">
            <div class="section">
                <fb-input type="hidden" name="id"></fb-input>
                <fb-input name="email_to" label="{{ __('high-sender::smtp-accounts.email_to') }}"></fb-input>
            </div>
        </form-builder>
    </modal-window>

    {{--Add account--}}
    <modal-window name="form" class="modal_formbuilder" title="{{ __('high-sender::smtp-accounts.addition_account') }}">
        <form-builder url="{{ route('high-sender.smtp_accounts.store') }}" @sended="AWES.emit('content::smtp-accounts_table:update')"
                      send-text="{{ __('high-sender::general.add') }}"
                      cancel-text="{{ __('high-sender::general.cancel') }}">
            <div class="section">
                <fb-input name="name" label="{{ __('high-sender::general.name') }}"></fb-input>
                <fb-input name="host" label="{{ __('high-sender::smtp-accounts.host') }}"></fb-input>
                <fb-input name="port" label="{{ __('high-sender::smtp-accounts.port') }}"></fb-input>
                <fb-input name="username" label="{{ __('high-sender::smtp-accounts.username') }}"></fb-input>
                <fb-input type="password" name="password" label="{{ __('high-sender::general.password') }}"></fb-input>
                <fb-input name="encryption" label="{{ __('high-sender::smtp-accounts.encryption') }}"></fb-input>
                <fb-input name="from_name" label="{{ __('high-sender::smtp-accounts.from_name') }}"></fb-input>
                <fb-input name="from_address" label="{{ __('high-sender::smtp-accounts.from_address') }}"></fb-input>
            </div>
        </form-builder>
    </modal-window>

    {{--Edit account--}}
    <modal-window name="edit-account" class="modal_formbuilder" title="{{ __('high-sender::smtp-accounts.edition_account') }}">
        <form-builder method="PATCH" url="{{ route('high-sender.smtp_accounts.index') }}/{id}" store-data="editAccount" @sended="AWES.emit('content::smtp-accounts_table:update')"
                      send-text="{{ __('high-sender::general.save') }}"
                      cancel-text="{{ __('high-sender::general.cancel') }}">
            <fb-input name="name" label="{{ __('high-sender::general.name') }}"></fb-input>
            <fb-input name="host" label="{{ __('high-sender::smtp-accounts.host') }}"></fb-input>
            <fb-input name="port" label="{{ __('high-sender::smtp-accounts.port') }}"></fb-input>
            <fb-input name="username" label="{{ __('high-sender::smtp-accounts.username') }}"></fb-input>
            <fb-input type="password" name="password" label="{{ __('high-sender::general.password') }}"></fb-input>
            <fb-input name="encryption" label="{{ __('high-sender::smtp-accounts.encryption') }}"></fb-input>
            <fb-input name="from_name" label="{{ __('high-sender::smtp-accounts.from_name') }}"></fb-input>
            <fb-input name="from_address" label="{{ __('high-sender::smtp-accounts.from_address') }}"></fb-input>
        </form-builder>
    </modal-window>

    {{--Delete account--}}
    <modal-window name="delete-account" class="modal_formbuilder" title="{{ __('high-sender::smtp-accounts.are_you_sure_delete_account') }}">
        <form-builder name="delete-account" method="DELETE" url="{{ route('high-sender.smtp_accounts.index') }}/{id}" store-data="deleteAccount" @sended="AWES.emit('content::smtp-accounts_table:update')"
                      send-text="{{ __('high-sender::general.yes') }}"
                      cancel-text="{{ __('high-sender::general.no') }}"
                      disabled-dialog>
            <template slot-scope="block">
                <!-- Fix enable button yes for delete -->
                <input type="hidden" name="isEdited" :value="AWES._store.state.forms['delete-account']['isEdited'] = true"/>
            </template>
        </form-builder>
    </modal-window>

@endsection
