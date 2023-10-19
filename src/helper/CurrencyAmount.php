<?php
/**
 * CurrencyAmount.php
 *
 * User: shuixuqiang
 * Date: 2023/10/17
 * Time: 17:10
 */

namespace Ash\Helper;

use Ash\Common\Traits\CurrencyTraits;
use Ash\Exception\InvalidArgumentException;
use Ash\Format\Currency;

class CurrencyAmount {
    use CurrencyTraits;

    /**
     * 获取对象属性方法
     *
     * @param float $amount
     * @param int $currencyId
     * @param string $currency
     * @return array
     */
    public function get(float $amount, int $currencyId = 0, string $currency = ''): Currency
    {
        if (empty($currencyId) && empty($currency)) {
            throw new InvalidArgumentException('currencyId and currency cannot be empty at the same time');
        }
        $result = ['amount' => $amount];
        if (!empty($currencyId)) {
            $result['currency_id'] = $currencyId;
            $result['currency'] = self::$currencyArr[$currencyId]['currency'];
        } elseif (!empty($currency)) {
            $newData = [];
            foreach (self::$currencyArr as $originalKey => $item) {
                $newData[$item['currency']] = $originalKey;
            }
            $result['currency_id'] = $newData[$currency];
            $result['currency'] = $currency;
        }
        return new Currency($result);
    }
}