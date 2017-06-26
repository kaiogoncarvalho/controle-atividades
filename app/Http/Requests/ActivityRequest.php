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
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:600',
            'start_date'  => 'required|date_format:d/m/Y',
            'end_date'    => 'required_if:status_id,4|nullable|date_format:d/m/Y|after_or_equal:start_date',
            'status_id'   => 'required|exists:status,id',
            'situation'   => 'required|boolean',
        ];
    }

    public function attributes()
    {
        return [
            'name'        => trans_choice('activity.name', 1),
            'description' => trans_choice('activity.description', 1),
            'start_date'  => trans_choice('activity.start_date', 1),
            'end_date'    => trans_choice('activity.end_date', 1),
            'status_id'   => trans_choice('activity.status', 1),
            'situation'   => trans_choice('activity.situation', 1),
        ];

    }

    public function messages()
    {
        return [
            'end_date.required_if' => trans_choice('validation.custom.end_date.required_if', 1),
        ];
    }
}
