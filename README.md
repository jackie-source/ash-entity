# 常用的一些扩展类库


> 以下类库都在`\\library\\helper`命名空间下

## Str

> 字符串操作

```
// 检查字符串中是否包含某些字符串
Str::contains($haystack, $needles)

// 检查字符串是否以某些字符串结尾
Str::endsWith($haystack, $needles)

// 获取指定长度的随机字母数字组合的字符串
Str::random($length = 16)

// 字符串转小写
Str::lower($value)

// 字符串转大写
Str::upper($value)

// 获取字符串的长度
Str::length($value)

// 截取字符串
Str::substr($string, $start, $length = null)

```
## Arr

> 数组操作

```

// 确定给定值是否为数组可访问的。
Arr::accessible($value)

// 在数组中添加一个不存在的元素
Arr::add($array, $key, $value)

// 将数组的数组折叠成单个数组
Arr::collapse($array)

// 将一个数组划分为两个数组。一个带有键，另一个带有值
Arr::divide($array)

// 返回数组中第一个通过给定真值检验的元素
Arr::first($array, callable $callback = null, $default = null)

// 从给定数组中删除一个或多个数组项
Arr::forget(&$array, $keys)

// 检查数组中是否存在一个或多个项
Arr::has($array, $keys)

```

## CurrencyAmount

> 币种金额操作

```

$objCurrencyAmount = new CurrencyAmount();

/**
 * 获取对象属性方法
 *
 * 返回对象数据结构，例如:
 * library\format\Currency Object
 *  (
 *   [currency:protected] => GBP
 *   [amount:protected] => 100
 *   [currency_id:protected] => 1
 * )
 */
$obj = $objCurrencyAmount->get(float $amount, int $currencyId = 0, string $currency = ''): Currency

// 获取属性币种ID
$obj->getCurrencyId(); // 1

// 获取属性币种
$obj->getCurrency(); // GBP

// 获取属性金额
$obj->getAmount(); // 100

// 对象转数组
$obj->toArray(); // Array([currency] => GBP [amount] => 100 [currency_id] => 1)

// 对象转Json
$obj->toJson(); // {"currency":"GBP","amount":100,"currency_id":1}
```