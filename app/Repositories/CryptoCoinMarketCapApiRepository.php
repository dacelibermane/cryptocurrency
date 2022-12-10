<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Collections\CryptocurrenciesCollection;
use App\Models\Cryptocurrency;
use CoinMarketCap;

class CryptoCoinMarketCapApiRepository implements CryptocurrencyRepository
{
    private CoinMarketCap\Api $coinMarketCapApi;

    public function __construct()
    {
        $this->coinMarketCapApi = new CoinMarketCap\Api($_ENV['API_KEY']);;
    }
    public function getCryptocurrencies(): CryptocurrenciesCollection
    {
        $response = $this->coinMarketCapApi->cryptocurrency()->listingsLatest(['limit' => 10, 'convert' => 'EUR']);

        $currencies = [];
        foreach ($response->data as $currency) {
            $currencies[] = new Cryptocurrency(
                $currency->id,
                $currency->name,
                $currency->symbol,
                $this->getCurrencyLogo($currency->id),
                $currency->quote->EUR->price,
                $currency->quote->EUR->percent_change_1h,
                $currency->quote->EUR->percent_change_24h
            );
        }
        return new CryptocurrenciesCollection($currencies);
    }

    public function getCurrencyLogo(int $id): string
    {
        return $this->coinMarketCapApi->cryptocurrency()->info(['id' => $id])->data->{$id}->logo;
    }
}