<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Collections\CryptocurrenciesCollection;
use App\Models\Cryptocurrency;
use CoinMarketCap;

class CryptocurrencyApiRepository implements CryptocurrencyRepository
{
    public function getCryptocurrencies(): CryptocurrenciesCollection
    {
        $cmc = new CoinMarketCap\Api($_ENV['API_KEY']);
        $response = $cmc->cryptocurrency()->listingsLatest(['limit' => 10, 'convert' => 'EUR']);
        $crypto = json_decode(json_encode($response), true);

        $currencies = [];
        foreach ($crypto['data'] as $currency) {
            $currencies[] = new Cryptocurrency(
                $currency['name'],
                $currency['symbol'],
                $currency["quote"]['EUR']["price"],
                $currency["quote"]['EUR']["percent_change_1h"],
                $currency["quote"]['EUR']["percent_change_24h"]
            );
        }
        return new CryptocurrenciesCollection($currencies);
    }
}