<?php declare(strict_types=1);

namespace App\Controllers;

use App\Template;

class ProfileController
{
    public function showProfile(): Template
    {
        return new Template('profile.twig');
    }
}