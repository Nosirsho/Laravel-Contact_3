<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class UpdateContactRequest extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'phone' => ['required']
        ];
    }
}
