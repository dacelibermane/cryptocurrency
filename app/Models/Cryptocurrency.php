<?php declare(strict_types=1);

namespace App\Models;

class Cryptocurrency
{
    private string $name;
    private string $symbol;
    private float $price;
    private float $percentChange1h;
    private float $percentChange24h;

    public function __construct(
        string $name,
        string $symbol,
        float $price,
        float $percentChange1h,
        float $percentChange24h)
    {
        $this->name = $name;
        $this->symbol = $symbol;
//        $this->logo = $logo;
        $this->price = $price;
        $this->percentChange1h = $percentChange1h;
        $this->percentChange24h = $percentChange24h;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

//    public function getLogo(): string
//    {
//        return $this->logo;
//    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getPercentChange1h(): float
    {
        return $this->percentChange1h;
    }

    public function getPercentChange24h(): float
    {
        return $this->percentChange24h;
    }
}