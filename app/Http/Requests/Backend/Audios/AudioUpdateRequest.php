<?php


namespace App\Http\Requests\Backend\Audios;


use Illuminate\Foundation\Http\FormRequest;

class AudioUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'post_id' => 'required|exists:App\Models\Post,id',
            'link' => 'required|url|max:255',
        ];
    }
}
