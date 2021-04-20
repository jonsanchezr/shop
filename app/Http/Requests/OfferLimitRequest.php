<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferLimitRequest extends FormRequest
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
            'title' => 'required|string',
            'url' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'date_end' => 'nullable',
        ];

        if ($this->isMethod('post')) {
            $rules = array_merge($rules, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=519,height=477',
            ]);
        } else {
            $rules = array_merge($rules, [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=519,height=477',
            ]);
        }

        return $rules;
    }
}