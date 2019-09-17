<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'product_name' => 'required|min:3|unique:products',
            'product_group_id' => 'required',
            'product_primary_image' => 'required',
            'product.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_code' => 'required|min:3|unique:products',
            'barcode' => 'required|min:3|unique:products',
            'price' => 'required|numeric',
            'promotion_price' => 'numeric',
            'warning_out_of_stock' => 'numeric',
            'description' => 'required|min:3',
            'weight' => 'numeric',
        ];
    }
}
