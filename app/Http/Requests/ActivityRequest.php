<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:600',
            'start_date'  => 'required|date_format:d/m/Y|date',
            'end_date'    => 'nullable|date_format:d/m/Y|date',
            'status'      => 'required|exists:status,id',
            'situation'   => 'required|boolean',
        ];
    }
}
