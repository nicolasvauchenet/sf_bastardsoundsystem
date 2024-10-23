<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
#[\Attribute] class UniqueEmail extends Constraint
{
    public string $message = 'Cette adresse e-mail est déjà utilisée.';
    public array $repositories;

    public function __construct(array $repositories, string $message = null, array $groups = null, mixed $payload = null)
    {
        parent::__construct([], $groups, $payload);
        $this->repositories = $repositories;
        if($message) {
            $this->message = $message;
        }
    }

    public function validatedBy(): string
    {
        return static::class . 'Validator';
    }
}
