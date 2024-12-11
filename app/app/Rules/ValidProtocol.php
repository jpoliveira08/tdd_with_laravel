<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class ValidProtocol implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param $attribute: The name of the attribute being validated
     * @param $value: The value of the attribute being validated
     * @param $fail: A closure that you can call if the validation fails.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Str::startsWith($value, ['http://', 'https://'])) {
            $fail('The :attribute must be a valid URL.');
        }
    }
}
