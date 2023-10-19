<?php
/**
 * Currency.php
 *
 * User: shuixuqiang
 * Date: 2023/10/18
 * Time: 17:20
 */

namespace Ash\Format;

use Ash\Format;

/**
 * @method string getCurrency()
 * @method float getAmount()
 * @method int getCurrencyId()
 *
 * @method Currency setCurrency(string $value)
 * @method Currency setAmount(float $value)
 * @method Currency setCurrencyId(int $value)
 */
class Currency extends Format {

    /**
     * 币种三字码
     *
     * @var string
     */
    protected string $currency;

    /**
     * 金额
     *
     * @var float
     */
    protected float $amount;

    /**
     * 币种ID
     *
     * @var int
     */
    protected int $currency_id;
}