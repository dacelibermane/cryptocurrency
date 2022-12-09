<?php declare(strict_types=1);

namespace App\Models\Collections;

use App\Models\Cryptocurrency;

class CryptocurrenciesCollection
{
    private array $cryptocurrencies = [];

    public function __construct(array $cryptocurrencies)
    {
        foreach ($cryptocurrencies as $currency) {
            $this->add($currency);
        }
    }

    public function add(Cryptocurrency $currency): void
    {
        $this->cryptocurrencies[] = $currency;
    }

    public function getCryptoCurrencies(): array
    {
        return $this->cryptocurrencies;
    }
}