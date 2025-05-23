<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBudgetRequest extends FormRequest
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
        $budget = $this->route("budget");

        return [
            "amount" => ["required", "numeric", "min:2"],
            "start_date" => ["required", "date"],
            "end_date" => ["required", "date"],
            "category_id" => ["required", "exists:categories,id", "unique:budgets,category_id,$budget->id"]
        ];
    }
}
