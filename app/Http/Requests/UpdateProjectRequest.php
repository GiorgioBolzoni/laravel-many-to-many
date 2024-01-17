<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:200', Rule::unique('projects')->ignore($this->project)],
            'link' => 'required|max:255|url',
            'body' => ['nullable'],
            'image' => ['nullable', 'image', 'mimes: jpeg,jpg,png', 'max:10240'],
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'title.unique' => 'Questo titolo esiste già',
            'link.required' => 'Il link al progetto esterno è obbligatorio',
            'link.max' => 'Il link deve avere massimo :max caratteri',
            'link.url' => 'Devi inserire una url valida',
            'image.image' => 'L\'immagine deve essere di tipo image',
            'image.max' => 'L\'immagine deve essere massimo 10MB',
            'type_id.exists' => 'Devi scegliere un type esistente',
            'technologies.exists' => 'Devi scegliere delle tecnologie esistenti'

        ];
    }
}
