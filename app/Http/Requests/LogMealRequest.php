<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogMealRequest extends FormRequest
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
            'portion_value' => 'numeric',
            'portion_rating' => 'numeric',
            'balance_value' => 'numeric',
            'balance_rating' => 'numeric',
            'sugar_fat_value' => 'numeric',
            'sugar_fat_rating' => 'numeric'
        ];
    }
}
