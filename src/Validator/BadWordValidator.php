<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class BadWordValidator extends ConstraintValidator
{

    public function validate($value, Constraint $constraint)
    {
        /* @var App\Validator\BadWord $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        if (!is_scalar($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new UnexpectedTypeException($value, 'string');
        }

        $stringValue = (string)$value;

        // Load blacklist
        $blacklist = $this->getBlackListArray();

        // Split input value into words
        $words = $this->getWordsArray($stringValue);

        // Search for bad words
        $match = array_intersect($words, $blacklist);

        if (count($match) > 0) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ word }}', reset($match))
                ->setCode(BadWord::CONTAINS_BAD_WORD)
                ->addViolation();
        }
    }

    private function getBlackListArray()
    {
        return file("public/badwords.txt", FILE_IGNORE_NEW_LINES);
    }

    private function getWordsArray($text)
    {
        $text = strtolower($text);
        $text = preg_replace("/[^a-z0-9 ]/", ' ', $text);
        $words = explode(' ', $text);
        return array_unique($words);
    }
}
