<?php

namespace Lrf141\Rook;

class Engine {


    private $directory;
    private $fileExtension;
    
    public function __construct(string $base_dir, $ext = 'php')
    {
        $this->directory = new Directory($base_dir);
        $this->fileExtension = new FileExtension($ext);
    }

    public function make(string $name): Template
    {
        return new Template($this, $name);
    }

    public function render(string $template, array $data = []): string
    {
        return $this->make($template)->render($data);
    }

    public function getDirectory(): Directory
    {
        return $this->directory;
    }

    public function getFileExtension(): FileExtension
    {
        return $this->fileExtension;
    }

}
