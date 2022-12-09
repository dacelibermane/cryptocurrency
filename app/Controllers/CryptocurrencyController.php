<?php declare(strict_types=1);

namespace App\Controllers;

use App\Services\CryptoCurrenciesService;
use App\Template;

class CryptocurrencyController
{
    public function index():Template
    {
        $currencies = (new CryptocurrenciesService())->execute();

        return new Template('currency.twig', ['currency' => $currencies->getCryptocurrencies()]);
    }
}