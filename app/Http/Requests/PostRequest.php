<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
                // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title'       => 'required|min:2',
                        'body'        => 'required|min:4',
                        'category_id' => 'required|numeric',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                };
        }
    }

    public function messages()
    {
        return [
            'title.min' => '标题至少包含两个字符',
            'body.min' => '文章内容至少包含四个字符',
        ];
    }
}