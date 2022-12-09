<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Collections\CryptocurrenciesCollection;
use App\Repositories\CryptocurrencyRepository;
use App\Repositories\CryptocurrencyApiRepository;

class CryptoCurrenciesService
{
    private CryptocurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = new CryptocurrencyApiRepository();
    }

    public function execute(): CryptocurrenciesCollection
    {
        return $this->currencyRepository->getCryptocurrencies();
    }
}