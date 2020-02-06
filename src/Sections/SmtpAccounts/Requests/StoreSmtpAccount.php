<?php

namespace NetLinker\HighSender\Sections\SmtpAccounts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSmtpAccount extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'host' => 'required|string|max:255',
            'port' => 'required|integer',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'from_name' => 'required|string|max:255',
            'from_address' => 'required|email|max:255',
        ];
    }
}
