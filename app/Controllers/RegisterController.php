<?php declare(strict_types=1);

namespace App\Controllers;

use App\Redirect;
use App\Services\RegisterService;
use App\Services\RegisterServiceRequest;
use App\Template;
use App\Validation;

class RegisterController
{
    public function showForm(): Template
    {
        return Template::render('register.twig');
    }

    public function register(): Redirect
    {
        $validation = new Validation();
        $validation->validateRegistration($_POST);

        if (count($_SESSION['errors']) > 0) {
            return Redirect::toPage('/register');
        }

        $registerService = new RegisterService();
        $registerService->execute(
            new RegisterServiceRequest(
                $_POST['name'],
                $_POST['email'],
                $_POST['password']
            )
        );
        return Redirect::toPage('/login');
    }
}