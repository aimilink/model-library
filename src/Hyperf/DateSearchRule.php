<?php

namespace Aimilink\ModelLibrary\Hyperf;

use Hyperf\Validation\Contract\Rule;

class DateSearchRule extends \Aimilink\ModelLibrary\Kernel\DateSearchRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes(string $attribute, $value) :bool
    {
       return $this->validate($attribute, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() :array|string
    {
        return '日期格式错误.';
    }
}
