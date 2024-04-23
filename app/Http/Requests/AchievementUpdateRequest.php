<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class AchievementUpdateRequest extends FormRequest
{
    //

    




    public function rules()
    {
        return [
            'event' => ['required', 'string', 'max:255'],
            'sportstype' => ['required', 'string'],
            'placing' => ['required', 'string'],
        ];
    }
}
