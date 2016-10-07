<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 07/10/2016
 * Time: 16:43
 */

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsTelephoneValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!preg_match('/^0[0-9]{9}$/', $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}