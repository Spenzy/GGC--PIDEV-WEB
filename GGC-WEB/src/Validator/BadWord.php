<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class BadWord extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    const CONTAINS_BAD_WORD = '06f8750a-c8ff-49ec-89e9-4feee1b6cd25';
    public $message = 'Ce message contient des mots non permis "{{ value }}".';

    public function validatedBy(): string
    {
        return 'tuxone, modified by Spenzy';
    }
}
