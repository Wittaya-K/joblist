<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoblistRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ];
    }
}