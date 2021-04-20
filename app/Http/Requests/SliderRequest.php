<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'brand_id' => 'required',
            'title' => 'required|string',
            'amount' => 'required|numeric',
            'url' => 'required|string',
        ];

        if ($this->isMethod('post')) {
            $rules = array_merge($rules, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=675,height=432',
            ]);
        } else {
            $rules = array_merge($rules, [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=675,height=432',
            ]);
        }

        return $rules;
    }
}