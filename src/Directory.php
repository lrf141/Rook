<?php

namespace Lrf141\Rook;

use LogicException;

/**
 * manage path to template directory
 */
class Directory
{

    /**
     * path to template directory
     * @var string
     */
    private $path;

    /**
     * generate new Directory Instance
     * @param string $path
     */
    public function __construct(string $path = null)
    {
        $this->set($path);
    }

    /**
     * set path after check is_dir
     * @param string $path
     */
    public function set(string $path)
    {
        if (is_null($path) || !is_dir($path)) {
            throw new LogicException('the path "' . $path . '" does not exist!!');
        }

        $this->path = $path;
    }

    /**
     * get path to directory
     * @return string 
     */
    public function get(): string
    {
        return $this->path;
    }
}
