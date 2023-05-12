<?php

declare(strict_types=1);

namespace App\Http\Requests\Forms\Mails;

use App\Enums\MailStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
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
            'username' => ['required', 'string', 'min:2', 'max:200'],
            'comment' => ['required', 'string', 'min:2', 'max:200'],
            'status' => ['required', new Enum(MailStatus::class)],
        ];
    }
}
