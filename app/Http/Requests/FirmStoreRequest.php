<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirmStoreRequest extends FormRequest
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
            'name' => 'required',
            'sector_id' => 'required',
            'email' => 'required|email',
            'fax' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'division' => 'required',
        ];
    }
}
