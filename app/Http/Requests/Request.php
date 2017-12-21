<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    return[
      'private_id.required' => 'The store owner field is required.'
    ];
}
