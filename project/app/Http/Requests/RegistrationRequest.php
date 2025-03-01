<?php

namespace App\Http\Requests;

use App\Models\Promo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'nickname' => 'required|regex:/^[\pL\s\d\_\-]+$/u',
            'promo' => [
                'required',
                Rule::exists('promos', 'code')->where(function ($query) {
                    $query->where('active', 1);
                }),
                function (string $attribute, mixed $value, \Closure $fail) {
                    if (!Promo::where('code', $value)->whereColumn('quantity', '>', 'employed')->exists()) {
                        $fail('Активация данного промокода закончилась');
                    }
                }
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nickname.regex' => 'Никнейм может содержать только буквы, цифры и знаки "-", "_"',
            'promo.exists' => 'Промокод не активен, либо его не существует'
        ];
    }
}
