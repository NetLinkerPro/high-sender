<?php

namespace NetLinker\HighSender\Sections\SmtpAccounts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SmtpAccount extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'host' => $this->host,
            'port' => $this->port,
            'username' => $this->username,
            'password' => $this->password,
            'encryption' => $this->encryption,
            'from_name' => $this->from_name,
            'from_address' => $this->from_address,
        ];
    }
}