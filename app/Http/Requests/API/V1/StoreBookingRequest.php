<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookingRequest extends FormRequest
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
            'trip_id' => ['required', 'integer', 'exists:trips,id'],
            'seat_id' => ['required', 'integer', 'exists:bus_seats,id'],
            'payment_way' => ['required', Rule::in(['cash', 'visa'])]
        ];
    }
}
