<?php

declare(strict_types=1);

namespace App\Http\Requests\NewsSources;

use App\Enums\NewsSourceStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EditRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'url' => ['required', 'string', 'min:8'],
            'image' => ['sometimes'],
            'description' => ['nullable', 'string'],
            'status' => ['required', new Enum(NewsSourceStatus::class)],
        ];
    }
}
