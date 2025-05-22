<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'published_at' => 'nullable|date',
        ];
    }
    
    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'content.required' => 'O conteúdo é obrigatório.',
            'category_id.exists' => 'A categoria selecionada é inválida.',
            'published_at.date' => 'A data de publicação deve ser uma data válida.',
        ];
    }
    
    public function attributes(): array
    {
        return [
            'title' => 'título',
            'content' => 'conteúdo',
            'category_id' => 'categoria',
            'published_at' => 'data de publicação',
        ];
    }    
}
