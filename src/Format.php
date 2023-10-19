<?php
/**
 * Format.php
 *
 * User: shuixuqiang
 * Date: 2023/10/18
 * Time: 19:13
 */

namespace Ash;

use Ash\Contract\Arrayable;
use Ash\Contract\Jsonable;
use Ash\Helper\Str;
use IteratorAggregate;
use JsonSerializable;

class Format implements Arrayable, Jsonable, IteratorAggregate, JsonSerializable {

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $method = Str::camel('set_' . $key);
            $this->{$method}($value);
        }
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->toArray());
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @param int $options
     * @return string
     */
    public function toJson(int $options = JSON_UNESCAPED_UNICODE): string
    {
        // TODO: Implement toJson() method.
        return json_encode($this->toArray(), $options);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        // TODO: Implement toArray() method.
        $formatArray = [];
        $allProtectedFields = $this->getAllProtected();
        foreach ($allProtectedFields as $k => $field) {
            $formatArray[$field] = $this->{$field};
        }
        return $formatArray;
    }

    /**
     * @return array
     */
    public function getAllProtected()
    {
        $ref = new \ReflectionClass($this);
        $proper = $ref->getProperties();
        $res = [];
        foreach ($proper as $value) {
            /* @var $value \ReflectionProperty */
            if ($value->getModifiers() == $value::IS_PROTECTED) {
                array_push($res, $value->name);
            }
        }
        return $res;
    }

    /**
     * @param $name
     * @param $args
     * @return $this|null
     * @throws \Exception
     */
    public function __call($name, $args)
    {
        if (substr($name, 0, 3) == 'get') {
            $field = Str::snake(substr($name, 3));

            return $this->{$field} ?? null;
        }

        if (substr($name, 0, 3) == 'set') {
            $field = Str::snake(substr($name, 3));
            if (property_exists($this, $field)) {
                $this->{$field} = $args[0] ?? null;
            }

            return $this;
        }
        throw new \Exception('call to undefined method: ' . $name);
    }

    /**
     * @return array
     */
    public function getAllProtectedWithType()
    {
        $ref = new \ReflectionClass($this);
        $proper = $ref->getProperties();
        $res = [];
        foreach ($proper as $value) {
            /* @var $value \ReflectionProperty */
            if ($value->getModifiers() == $value::IS_PROTECTED) {
                $_p = [];
                $_p['name'] = $value->name;
                $_p['type'] = null;
                if (! is_null($value->getType())) {
                    $_p['type'] = $value->getType()->getName();
                }
                $res[] = $_p;
            }
        }
        return $res;
    }
}