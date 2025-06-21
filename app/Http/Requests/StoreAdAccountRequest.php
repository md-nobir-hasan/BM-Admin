<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdAccountRequest extends FormRequest
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
        // dd($this->all());
        return [
            'name' => ['required','string','max:255'],
            'bm_id' => ['required','string','max:255'],
            'credit_line'=> ['required','string','max:255'],
            'card_line'=> ['required','string','max:255'],

            'fb_page_link1'=> ['required','string','max:255'],
            'fb_page_link2'=> ['nullable','string','max:255'],
            'fb_page_link3'=> ['nullable','string','max:255'],
            'fb_page_link4'=> ['nullable','string','max:255'],
            'fb_page_link5'=> ['nullable','string','max:255'],

            'website_link1'=> ['required','string','max:255'],
            'website_link2'=> ['nullable','string','max:255'],

            'monthly_budget'=> ['required','numeric','max:10000000'],
            'campaign_start_date'=> ['nullable','date'],
        ];
    }
}
