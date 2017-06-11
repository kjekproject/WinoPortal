<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class YearLimitValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        $year = date('Y');
        if ($value > $year) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}

