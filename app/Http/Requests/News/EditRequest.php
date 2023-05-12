<?php

declare(strict_types=1);

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
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
    public function rules()
    {
        return [
            'category_ids.*' => ['exists:categories,id'],
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'source_id' => ['sometimes'],
            'image' => ['sometimes'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function getCategoryIds(): array
    {
        return (array) ($this->validated('category_ids'));
    }

    public function getNewsSourcesIds(): array
    {
        return (array) ($this->validated('source_ids'));
    }

    public function attributes(): array
    {
        return [
            'title' => 'наименование',

        ];
    }

    public function messages(): array
    {
        return [
            'requered' => 'Нужно заполнить поле :attribute'
        ];
    }
}
