<?php
namespace InlineCss\TestCase\View\Helper;

use Cake\Event\Event;
use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use Cake\View\View;
use InlineCss\View\Helper\InlineCssHelper;

class InlineCssHelperTest extends TestCase
{

    public $InlineCss = null;

    public function setUp(): void
    {
        parent::setUp();

        $this->View = new View(new ServerRequest());
        $this->InlineCss = new InlineCssHelper($this->View);
    }

    public function testAfterLayout()
    {
        $this->View->assign('content', '<style type="text/css">a{color:red}</style><p><a href="#">Test</a></p>');

        $this->InlineCss->afterLayout(new Event(''), null);

        $expected = '<p><a href="#" style="color: red;">Test</a></p>';
        $this->assertStringContainsString($expected, $this->View->fetch('content'));
    }

}
