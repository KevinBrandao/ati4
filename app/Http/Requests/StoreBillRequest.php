<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user_name = auth()->user()->name;

        return !str_contains($user_name, 'Guest');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
            return [
                'invoice'=> 'required',
                'installment'=> 'required',
                'value'=> 'required',
                'client_id'=> 'required',
                'due_date' => 'required',
                'payment_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
        'invoice.required' => 'Uma fatura é obrigatória'
        ];
    }

}
