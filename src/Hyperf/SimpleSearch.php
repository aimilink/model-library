<?php

namespace Aimilink\ModelLibrary\Hyperf;

use Hyperf\Utils\Arr;
use Hyperf\Utils\Collection;
use InvalidArgumentException;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;

class SimpleSearch extends \Aimilink\ModelLibrary\Kernel\SimpleSearch
{
    public function validate()
    {
        $validate = make(ValidatorFactoryInterface::class)
            ->make(
                $this->attributes ?: make(RequestInterface::class)->all(),
                $this->getRules()
            );

        if ($validate->fails()) {
            throw new InvalidArgumentException();
        }
    }

    public function getDateRule()
    {
        return new DateSearchRule();
    }

    public function getInputData()
    {
        return Arr::only($this->attributes ?: make(RequestInterface::class)->all(), array_keys($this->items));
    }
}