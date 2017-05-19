<?php

namespace Statamic\Addons\Flash;

use Statamic\Exceptions\RedirectException;
use Statamic\Extend\Tags;

class FlashTags extends Tags
{
    /**
     * The {{ flash }} tag
     *
     * @return string|array
     */
    public function index()
    {
        return session($this->get('key') ? $this->get('key') : 'message');
    }

    /**
     * The {{ flash:set }} tag
     *
     * @return string|array
     */
    public function set()
    {

        $key = $this->get('key') ? $this->get('key') : 'message';
        $message = $this->get('message') ? $this->get('message') : null;
        request()->session()->flash($key, $message);
    }

    /**
     * The {{ flash:redirect }} tag
     *
     * @return array|string
     * @throws RedirectException
     */
    public function redirect()
    {
        $this->set();

        $e = new RedirectException;

        $e->setUrl($this->get(['to', 'url']));
        $e->setCode($this->get('response', 302));

        throw $e;
    }

    /**
     * The {{ flash:isSet }} tag pair
     *
     * @return array|string
     * @throws RedirectException
     */
     public function isSet()
     {
        if (strlen($this->index()) > 0) {
            return $this->parse([]);
        }
     }
}
