<?php

class ValidatorEmailService{
    public $errors = [];
    public function checkEmail(string $email){
        if(strlen($email) < 6){
            $this->errors[] = 'Почта должна быть длинной минимум 6 символов';
        }
        if (strpos($email, '@') == false) {
            $this->errors[] = 'Почта должна содержать символ "@".';
        }
        if (strpos($email, '.') == false) {
            $this->errors[] = 'Почта должна содержать символ "точка".';
        }
        return $this->errors;
    }
}