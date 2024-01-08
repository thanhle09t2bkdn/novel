<?php


namespace App\Http\Requests\Backend\Posts;


use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest
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
            'content' => 'required',
            'options' => 'required|array|min:2',
            'options.*.name' => 'required|min:3|max:255',
            'options.*.is_answer' => 'nullable|boolean',
        ];
    }
}
