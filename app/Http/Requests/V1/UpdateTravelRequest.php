<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateTravelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'title' => ['required'],
                'description' => ['required'],
                'image' => ['required'],
            ];
        } else {
            return [
                'title' => ['sometimes', 'required'],
                'description' => ['sometimes', 'required'],
                'image'  => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->postalCode) {
            $this->merge([
                'postal_code' => $this->postalCode
            ]);
        }
    }
}
