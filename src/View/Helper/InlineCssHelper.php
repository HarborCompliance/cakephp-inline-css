<?php
namespace InlineCss\View\Helper;

use Cake\View\Helper;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class InlineCssHelper extends Helper
{

    /**
     * After layout logic.
     *
     * @param \Cake\Event\Event $event Event
     * @param string $layoutFile Layout filename
     */
    public function afterLayout(\Cake\Event\Event $event, $layoutFile)
    {
        $content = $this->_View->Blocks->get('content');

        if (!isset($this->InlineCss)) {
            $this->InlineCss = new CssToInlineStyles();
        }

        // Convert inline style blocks to inline CSS on the HTML content.
        $content = $this->InlineCss->convert($content);

        $this->_View->Blocks->set('content', $content);

        return;
    }

}
