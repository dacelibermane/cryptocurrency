<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Collections\CryptocurrenciesCollection;

interface CryptocurrencyRepository
{
    public function getCryptocurrencies(): CryptocurrenciesCollection;
}