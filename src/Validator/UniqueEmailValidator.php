<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Doctrine\ORM\EntityManagerInterface;

class UniqueEmailValidator extends ConstraintValidator
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint): void
    {
        if(!$constraint instanceof UniqueEmail) {
            throw new UnexpectedTypeException($constraint, UniqueEmail::class);
        }

        if(null === $value || '' === $value) {
            return;
        }

        foreach($constraint->repositories as $repositoryClass) {
            $repository = $this->entityManager->getRepository($repositoryClass);
            $existingEntry = $repository->findOneBy(['email' => $value]);

            if($existingEntry) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ email }}', $value)
                    ->addViolation();

                return;
            }
        }
    }
}
