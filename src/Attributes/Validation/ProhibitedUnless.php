<?php

namespace Spatie\LaravelData\Attributes\Validation;

use Attribute;
use Spatie\LaravelData\Attributes\Validation\Concerns\BuildsValidationRules;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ProhibitedUnless implements ValidationAttribute
{
    use BuildsValidationRules;

    public function __construct(
        private string $field,
        private array | string $values
    ) {
    }

    public function getRules(): array
    {
        return ["prohibited_unless:{$this->field},{$this->normalizeValue($this->values)}"];
    }
}
