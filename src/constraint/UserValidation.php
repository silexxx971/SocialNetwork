<?php

namespace App\src\constraint;
use App\config\Parameter;

class UserValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if($name === 'pseudo') {
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'name') {
            $error = $this->checkName($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'firstname') {
            $error = $this->checkFirstName($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'email') {
            $error = $this->checkEmail($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'telephone') {
            $error = $this->checkTelephone($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'password') {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkPseudo($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('pseudo', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('pseudo', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('pseudo', $value, 255);
        }
    }

    private function checkName($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('name', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('name', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('name', $value, 255);
        }
    }

    private function checkFirstName($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('firstname', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('firstname', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('firstname', $value, 255);
        }
    }

    private function checkEmail($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('email', $value);
        }
        if($this->constraint->minLength($name, $value, 7)) {
            return $this->constraint->minLength('email', $value, 7);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('email', $value, 255);
        }
    }

    private function checkTelephone($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('telephone', $value);
        }
        if($this->constraint->minLength($name, $value, 10)) {
            return $this->constraint->minLength('telephone', $value, 10);
        }
    }

    private function checkPassword($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('password', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('password', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('password', $value, 255);
        }
    }
}