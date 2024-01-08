<?php


namespace App\Http\Requests\Backend\Posts;


use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'category_id' => 'nullable|exists:App\Models\Category,id',
            'content' => 'required',
            'type' => 'required|integer|in:' . implode(',', array_keys(Post::$typeNames)),
            'description' => 'required',
            'image' => 'nullable|url|max:255',
        ];
    }
}
