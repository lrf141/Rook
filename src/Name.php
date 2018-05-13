<?php

namespace Lrf141\Rook;

/**
 * manage template name
 */
class Name
{
    private $name;

    /**
     * generate new Name instance
     * @param string $name;
     *
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * set template name
     * @param string $name
     */
    public function set(string $name)
    {
        $this->name = $name;
    }

    /**
     * get template name
     * @return string
     */
    public function get(): string
    {
        return $this->name;
    }
}
