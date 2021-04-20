<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'short_description' => 'required|string',
            'large_description' => 'required|string',
            'amount' => 'required|numeric',
            'unit' => 'required|numeric',
            'slug' => 'required|string',
            'slot_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=260,height=176',
            'slot_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=260,height=176',
            'slot_image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=260,height=176',
            'slot_video' => 'nullable|file',
        ];

        if ($this->isMethod('post')) {
            $rules = array_merge($rules, [
                'slot_image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=260,height=176',
            ]);
        } else {
            $rules = array_merge($rules, [
                'slot_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=260,height=176',
            ]);
        }

        return $rules;
    }
}