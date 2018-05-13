<?php

use PHPUnit\Framework\TestCase;
use Lrf141\Rook\Template;
use Lrf141\Rook\Engine;

class TemplateTest extends TestCase
{
    public function testEscape()
    {
        $engine = new Engine("template/sample");
        $template = new Template($engine, "test");

        $escape = $template->escape('"hello,world"');
        $expect = '&quot;hello,world&quot;';

        $this->assertSame($expect, $escape);
    }
}
