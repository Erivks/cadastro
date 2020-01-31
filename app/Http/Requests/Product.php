<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
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
           'productName' => 'required',
           'productStock' => 'required',
           'productPrice' => 'required',
           'productCategory' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'productName.required' => 'O nome do produto é necessário',
            'productStock.required'  => 'O número do estoque é necessário',
            'productPrice.required' => 'O preço é necessário',
            'productCategory.required' => 'A categoria é necessária'
        ];
    }
}
