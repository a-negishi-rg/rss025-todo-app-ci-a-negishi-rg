<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * RSS025_TRAINING_PJ-61 バリデーション作成
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルール
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:30'],
            'content' => ['required', 'string'],
            'person_in_charge' => ['required', 'string', 'max:10'],
        ];
    }

     /**
     * エラーメッセージ
     * @return array
     */
      public function attributes(): array
    {
        return [
            'title' => 'タイトル',
            'content' => '内容',
            'person_in_charge' => '担当者',
        ];
    }
}
