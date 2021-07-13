<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YaziDuzenleRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'yazibaslik' => 'required|min:3|max:250',
            'yazikategori' => 'required',
            'yaziicerik' => 'required|min:10',
            
        ];
    }

    public function attributes()
    {
        return [
            'yazibaslik' => 'Yazı Başlığı',
            'yazikategori' => 'Yazı Kategorisi',
            'yaziicerik' => 'Yazı İçeriği',
        ];
    }}
