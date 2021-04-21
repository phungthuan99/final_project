<?php

namespace App\Http\Requests\backend\DoilichRequest;

use Illuminate\Foundation\Http\FormRequest;

class DoilichRequest extends FormRequest
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
            'id_date_old'=>'required',
            'date_update'=>'required|',
            'slot'=>'required',
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
