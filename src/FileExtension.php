<?php

namespace Lrf141\Rook;


class FileExtension
{

    private $fileExtension;

    public function __construct(string $fileExtension = 'php')
    {
        $this->set($fileExtension);
    }

    public function set(string $fileExtension)
    {
        $this->fileExtension = $fileExtension;
    }

    public function get(): string
    {
        return $this->fileExtension;
    }



}
