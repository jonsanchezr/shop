<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->authorizeRoles(['admin']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {  
        $rules = [
            'name_trade' => 'required|string',
            'name_legal' => 'required|string',
            'email' => 'required|string',
            'phone_local' => 'required|string',
            'phone_mobile' => 'nullable|string',
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
            'city' => 'required|string',
            'region' => 'nullable|string',
            'country' => 'required|string',
        ];

        if ($this->isMethod('post')) {
            $rules = array_merge($rules, [
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=254,height=48',
                'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=32,height=32',
            ]);
        } else {
            $rules = array_merge($rules, [
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=254,height=48',
                'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=32,height=32',
            ]);
        }

        return $rules;
    }
}