<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
        $game = $this->route('game');
        $image = $game ? 'nullable' : 'required';
        return [
            "name" => "required",
            "priority" => "required",
            "slug" => "required",
            "image_url" => $image,
            "parent_id" => "required",
            "workplace" => "required",
        ];
    }
}
