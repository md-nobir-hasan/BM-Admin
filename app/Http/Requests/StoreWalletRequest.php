<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWalletRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bank_type'=>'string|required',
            'amount'=>'numeric|required',
            'trx_id'=>'required|string',
            'ss' => 'nullable|image|mimes:jpg,png,jpeg'
        ];
    }

    public function attributes(){
        return[
            'ss'=> 'Receipt copy or screenshot',
            'bank_type'=> 'Bank selecting'
        ];
    }
}
