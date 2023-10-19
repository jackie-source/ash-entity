<?php
/**
 * GenCommentTest.php
 *
 * User: shuixuqiang
 * Date: 2023/10/18
 * Time: 19:44
 */

namespace Tests;

use Ash\Command\GenComment;
use Ash\Format\Currency;

class GenCommentTest extends TestCase {

    public function testRun() {
        // 生成类注释
        $obj = new GenComment(Currency::class);
        $obj->run();
    }
}