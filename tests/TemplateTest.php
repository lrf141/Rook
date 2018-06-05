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

    public function testGenerateLink()
    {
        $engine = new Engine('template/sample');
        $template = new Template($engine, 'test');

        $simple_link = $template->_link('/sample');
        $this->assertSame($simple_link, '/sample');

        $param = ['hello' => 'hello"', 'param' => 'test '];
        $link_with_param = $template->_link('/sample', $param);
        $this->assertSame($link_with_param, '/sample?hello=hello%22&param=test+');
    }
}
