<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class YearLimit extends Constraint
{
    public $message = 'Rocznik nie może być starszy niż bieżący rok.';
}

