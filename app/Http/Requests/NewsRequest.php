<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $imageRule = $this->isMethod('POST') ? 'required' : 'nullable';

        return [
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'excerpt_id' => 'required|string|max:500',
            'excerpt_en' => 'required|string|max:500',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'featured_image' => "$imageRule|image|mimes:jpeg,png,jpg,webp|max:2048",
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'meta_title_id' => 'nullable|string|max:70',
            'meta_title_en' => 'nullable|string|max:70',
            'meta_description_id' => 'nullable|string|max:160',
            'meta_description_en' => 'nullable|string|max:160',
            'meta_keywords_id' => 'nullable|string|max:255',
            'meta_keywords_en' => 'nullable|string|max:255',
            'is_published' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title_id.required' => 'Judul (Indonesia) wajib diisi',
            'title_en.required' => 'Title (English) is required',
            'excerpt_id.required' => 'Ringkasan (Indonesia) wajib diisi',
            'excerpt_en.required' => 'Excerpt (English) is required',
            'content_id.required' => 'Konten (Indonesia) wajib diisi',
            'content_en.required' => 'Content (English) is required',
            'featured_image.required' => 'Gambar utama wajib diisi',
            'featured_image.image' => 'File harus berupa gambar',
            'meta_title_id.max' => 'Meta title maksimal 70 karakter',
            'meta_description_id.max' => 'Meta description maksimal 160 karakter',
        ];
    }
}
