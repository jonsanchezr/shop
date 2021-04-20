<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|string',
            'slug' => 'required|string',
        ];

        if ($this->isMethod('post')) {
            $rules = array_merge($rules, [
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=330,height=88',
            ]);
        } else {
            $rules = array_merge($rules, [
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=330,height=88',
            ]);
        }

        return $rules;
        
    }
}

