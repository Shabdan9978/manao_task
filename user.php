<?php

/**
 * user class
 */

class User
{
    public $id = '';
    public $name = '';
    public $email = '';
    public $login = '';
    public $pass = '';

    public function login($data)
    {
        if (file_exists('users/' . $data->login . '.xml')) {
            $xml = simplexml_load_file('users/' . $data->login . '.xml');

            if (md5($data->password) == $xml->password) {
                session_start();
                $_SESSION['name'] = strval($xml->name);
                return "Login success!";
            } else {
                return "Password incorrect!";
            }
        } else {
            return "Такого пользователя не существует!";
        }
    }

    public function registration($data)
    {
        $errors = array();
        if (file_exists('users/' . $data->login . '.xml')) {
            $errors[] = 'Username already exists';
        }
        if ($data->name == 'undefined' || $data->name == '') {
            $errors[] = 'Username is blank';
        }
        if ($data->email == 'undefined') {
            $errors[] = 'Email is blank';
        }
        if ($data->password == '' || $data->confirm_password == '') {
            $errors[] = 'Passwords are blank';
        }
        if ($data->password != $data->confirm_password) {
            $errors[] = 'Passwords do not match';
        }
        if (count($errors) == 0) {
            $files = glob('users/*.xml');
            $this->id = count($files) + 1;
            $this->name = $data->name;
            $this->email = $data->email;
            $this->login = $data->login;
            $this->pass = md5($data->password);

            $xml = new SimpleXMLElement('<user></user>');
            $xml->addChild('id', $this->id);
            $xml->addChild('name', $this->name);
            $xml->addChild('email', $this->email);
            $xml->addChild('login', $this->login);
            $xml->addChild('password', $this->pass);
            $xml->asXML('users/' . $this->login . '.xml');

            return "Registration succes!";
        } else {
            return $errors;
        }
    }
}
