<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 07/10/2016
 * Time: 16:40
 */

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class IsTelephone extends Constraint
{
    public $message = 'Cela ne ressemble pas à un numéro de téléphone.';
}