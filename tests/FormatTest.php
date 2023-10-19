<?php
/**
 * FormatTest.php
 *
 * User: shuixuqiang
 * Date: 2023/10/17
 * Time: 17:33
 */

namespace Tests;

use Ash\Exception\InvalidArgumentException;
use Ash\Helper\CurrencyAmount;

class FormatTest extends TestCase
{
    public function testCurrencyAmount()
    {
        // 加断言异常
        $this->expectException(InvalidArgumentException::class);
        $obj = new CurrencyAmount();
        $array = $obj->get(100, 1);
        $this->assertSame('{"currency":"GBP","amount":100,"currency_id":1}', $array->toJson());
        $array = $obj->get(100, 0, 'GBP');
        $this->assertSame(['currency' => 'GBP', 'amount' => (float)100, 'currency_id' => 1], $array->toArray());
        $array = $obj->get(100);
        $this->assertSame(['currency' => 'GBP', 'amount' => (float)100, 'currency_id' => 1], $array->toArray());
    }
}