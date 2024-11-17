<?php

class ValidatorPasswordService{
    public $errors = [];
    public function checkPassword(string $password){
        if(strlen($password) < 5){
            $this->errors[] = 'Пароль должен быть длинной минимум 5 символов';
        }
        if (!preg_match('/[0-9]/', $password)) {
            $this->errors[] = 'Пароль должен содержать хотя бы одну цифру';
        }

        return $this->errors;
    }
}