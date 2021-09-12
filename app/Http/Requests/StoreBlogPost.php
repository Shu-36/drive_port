<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title'=>'required|integer',
            'body'=>'required|string',
            'category_id'=>'required'
        ];
    }
    
   public function attributes()
{
    return [
        'title' => 'タイトル',
        'body' => '本文',
        'category_id' => 'カテゴリー',
    ];
}
}
