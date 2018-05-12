<?php

namespace Lrf141\Rook;

class Engine
{
    /**
     * Default template directory
     * @var Directory
     */
    private $directory;

    /**
     * Template file extension
     * @var FileExtension
     */
    private $fileExtension;

    /**
     * create new Engine Instance
     * @param string $base_dir
     * @param string $ext file extension
     */
    public function __construct(string $base_dir, string $ext = 'php')
    {
        $this->directory = new Directory($base_dir);
        $this->fileExtension = new FileExtension($ext);
    }

    /**
     * generate Template
     * 
     * @param string $name template name
     * @return Template
     *
     */
    public function make(string $name): Template
    {
        return new Template($this, $name);
    }

    /**
     * render based on template
     *
     * @param string $template template name
     * @param array $data wanna use in template
     * @return string rendering result
     */
    public function render(string $template, array $data = []): string
    {
        return $this->make($template)->render($data);
    }

    /**
     * get path to templates Directory
     * @return Directory
     */
    public function getDirectory(): Directory
    {
        return $this->directory;
    }

    /**
     * get templates file extension
     * @return FileExtension
     */
    public function getFileExtension(): FileExtension
    {
        return $this->fileExtension;
    }
}
