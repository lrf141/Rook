<?php

namespace Lrf141\Rook;

use LogicException;

class Directory{

    private $path;

    public function __construct(string $path = null){
        $this->set($path);
    }

    public function set(string $path)
    {
        if (is_null($path) || !is_dir($path)) {
            throw new LogicException('the path "' . $path . '" does not exist!!');
        }

        $this->path = $path;
    }

    public function get(): string
    {
        return $this->path;
    }
}
