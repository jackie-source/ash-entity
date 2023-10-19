<?php
/**
 * CurrencyTraits.php
 *
 * User: shuixuqiang
 * Date: 2023/10/17
 * Time: 17:03
 */

namespace Ash\Common\Traits;

trait CurrencyTraits {

    /**
     * @var \string[][]
     */
    protected static $currencyArr = [
        1 => ['currency' => 'GBP', 'symbol' => '£'],
        2 => ['currency' => 'USD', 'symbol' => 'US$'],
        3 => ['currency' => 'CAD', 'symbol' => 'CA$'],
        4 => ['currency' => 'NZD', 'symbol' => 'NZ$'],
        5 => ['currency' => 'AUD', 'symbol' => 'AU$'],
        6 => ['currency' => 'JPY', 'symbol' => 'JP¥'],
        7 => ['currency' => 'EUR', 'symbol' => '€'],
        8 => ['currency' => 'SGD', 'symbol' => 'SG$'],
        9 => ['currency' => 'THB', 'symbol' => '฿'],
        10 => ['currency' => 'CNY', 'symbol' => '¥'],
        14 => ['currency' => 'MYR', 'symbol' => 'MY$'],
        17 => ['currency' => 'HKD', 'symbol' => 'HK$'],
        19 => ['currency' => 'KRW', 'symbol' => '₩'],
        20 => ['currency' => 'PHP', 'symbol' => '₱'],
        21 => ['currency' => 'TWD', 'symbol' => 'NT$'],
        22 => ['currency' => 'SEK', 'symbol' => 'kr'],
        23 => ['currency' => 'ZAR', 'symbol' => 'R'],
        24 => ['currency' => 'RUB', 'symbol' => '₽'],
        25 => ['currency' => 'INR', 'symbol' => '₹'],
        26 => ['currency' => 'TRY', 'symbol' => 'TRY'],
        27 => ['currency' => 'SOL', 'symbol' => 'SOL'],
        28 => ['currency' => 'IDR', 'symbol' => 'IDR'],
        29 => ['currency' => 'KHR', 'symbol' => 'KHR'],
        30 => ['currency' => 'MUR', 'symbol' => 'MUR'],
        31 => ['currency' => 'MAC', 'symbol' => 'MOP$'],
        32 => ['currency' => 'BUK', 'symbol' => 'BUK'],
        33 => ['currency' => 'KCS', 'symbol' => 'Kcs'],
        34 => ['currency' => 'AED', 'symbol' => 'AED'],
        35 => ['currency' => 'XCD', 'symbol' => 'XCD'],
        36 => ['currency' => 'LAK', 'symbol' => '₭'],
        37 => ['currency' => 'PKR', 'symbol' => 'PRK'],
        38 => ['currency' => 'CHF', 'symbol' => 'CHF'],
        39 => ['currency' => 'FRF', 'symbol' => 'FRF']
    ];
}