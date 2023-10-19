<?php
/**
 * GenComment.php
 *
 * User: shuixuqiang
 * Date: 2023/10/18
 * Time: 19:39
 */

namespace Ash\Command;


use Ash\Format;
use Ash\Helper\Str;

class GenComment
{
    protected string $classPath;

    protected Str $strHelper;

    public function __construct(string $classPath)
    {
        $this->classPath = $classPath;
        $this->strHelper = new Str();
    }

    /**
     * 执行类命令
     *
     * @return void
     */
    public function run()
    {
        if (! class_exists($this->classPath)) {
            echo 'file not found' . PHP_EOL;
            return;
        }

        $class = new $this->classPath();
        if (! $class instanceof Format) {
            echo 'not instance of format' . PHP_EOL;
            return;
        }
        $allProperties = $class->getAllProtectedWithType();
        $allPropertieNames = array_column($allProperties, 'name');
        $typeMap = array_column($allProperties, null, 'name');
        $methods = $this->getMethods($allPropertieNames, $typeMap);
        $this->fillMethods($methods, $allProperties);
        $notesStr = implode(PHP_EOL, $methods) . PHP_EOL;
        echo $notesStr . PHP_EOL;
    }

    /**
     * 获取方法
     *
     * @param array $pros
     * @param array $typeMap
     * @return array
     */
    private function getMethods(array $pros, array $typeMap)
    {
        $className = $this->getClassName();
        $res = [];
        // getter
        foreach ($pros as $key => $pro) {
            if (is_null($typeMap[$pro]['type'])) {
                $res[] = '* @method ' . $this->strHelper->camel('get_' . $pro . '()');
            } else {
                $res[] = '* @method ' . $typeMap[$pro]['type'] . ' ' . $this->strHelper->camel('get_' . $pro . '()');
            }
        }

        $res[] = '*';

        // setter
        foreach ($pros as $key => $pro) {
            if (is_null($typeMap[$pro]['type'])) {
                $res[] = sprintf('* @method %s %s', $className,  $this->strHelper->camel('set_' . $pro . '($value)'));
            } else {
                $res[] = sprintf('* @method %s %s', $className, $this->strHelper->camel('set_' . $pro . '(# $value)'));
            }
        }

        // 因为转了驼峰, 要在这里处理一下类型数据
        foreach ($res as &$m) {
            if (strpos($m, '#') !== false) {
                $_pro = str_replace('* @method '. $className .' set', '', $m);
                $_pro = str_replace('(#$value)', '', $_pro);
                $_pro = $this->strHelper->snake($_pro);
                $m = str_replace('#', $typeMap[$_pro]['type'] . ' ', $m);
            }
        }

        return $res;
    }

    /**
     * 填补方法
     *
     * @param $methods
     * @return void
     */
    private function fillMethods(&$methods)
    {
        $methods[] = '*/';
        array_unshift($methods, '/**');
    }

    /**
     * 读取文件
     *
     * @param string $filePath
     * @return false|string
     */
    private function readFile(string $filePath)
    {
        $file = fopen($filePath, 'a+');
        $content = fread($file, filesize($filePath));
        fclose($file);
        return $content;
    }

    /**
     * 写入文件
     *
     * @param $filePath
     * @param $newFile
     * @return void
     */
    private function rewriteFormat($filePath, $newFile)
    {
        $file = fopen($filePath, 'w+');
        fwrite($file, $newFile);
        fclose($file);
    }

    /**
     * 获取类名称
     *
     * @return false|mixed|string
     */
    private function getClassName()
    {
        $arr = explode('\\', $this->classPath);
        return end($arr);
    }
}