<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:0,1'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email'),],
            'emergency_number' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'running_club' => ['nullable', 'string', 'max:255'],
            'id_intra' => ['nullable', 'string', 'max:255'],
            'distance' => ['required', 'exists:sport_event_distances,id'],
            'confirmation_of_qualification' => ['nullable', 'string'],
            't_shirt' => ['required', 'string', 'max:10'],
            'confirmation_privacy' => ['accepted'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Full name',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'email' => 'Email',
            'emergency_number' => 'Emergency number',
            'country' => 'Country',
            'city' => 'City',
            'running_club' => 'Running club',
            'id_intra' => 'Intra ID',
            'distance' => 'Distance',
            'confirmation_of_qualification' => 'Confirmation of qualification',
            't_shirt' => 'T-shirt size',
            'confirmation_privacy' => 'Privacy confirmation',
        ];
    }
}
