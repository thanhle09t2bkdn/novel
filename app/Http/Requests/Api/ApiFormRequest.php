<?php


namespace App\Http\Requests\Api;


use App\Traits\ApiResponser;
use Illuminate\Foundation\Http\FormRequest;

class ApiFormRequest extends FormRequest
{
    use ApiResponser;

}
