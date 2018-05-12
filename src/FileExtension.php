<?php

namespace Lrf141\Rook;

/**
 * manage template file extension
 */
class FileExtension
{

    /**
     * file extension
     * @var FileExtension
     */
    private $fileExtension;

    /**
     * generate new FileExtension instance
     * @param string $fileExtension
     */
    public function __construct(string $fileExtension = 'php')
    {
        $this->set($fileExtension);
    }

    /**
     * set file ext
     * @param string $fileExtension
     */
    public function set(string $fileExtension)
    {
        $this->fileExtension = $fileExtension;
    }

    /**
     * return file ext
     * @param string
     */
    public function get(): string
    {
        return $this->fileExtension;
    }
}
