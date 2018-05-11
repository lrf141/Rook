<?php

namespace Lrf141\Rook;

use LogicException;
use Throwable;
use Exception;

class Template {

    private $engine;
    private $name;
    private $sections = array();
    private $data = array();

    public function __construct(Engine $engine, string $name)
    {
        $this->engine = $engine;
        $this->name = $name;
    }


    public function render(array $data = []): string 
    {
        $this->data($data);
        unset($data);
        extract($this->data);

        try{
            $level = ob_get_level();
            ob_start();
            $content = ob_get_clean();
            include $this->path();
            return $content;
        }catch (Throwable $e) {
            while (ob_get_level() > $level){
                ob_end_clean();
            }
            throw $e;
        }catch (Exception $e) {
            while (ob_get_level() > $level){
                ob_end_clean();
            }
            throw $e;
        }
    }

    public function data(array $data = null)
    {
        if (is_null($data)){
            return $this->data;
        }

        $this->data = array_merge($this->data, $data);
    }

    public function path(): string
    {
        $dir = $this->engine->getDirectory()->get();
        $ext = $this->engine->getFileExtension()->get();
        $path = $dir . '/' . $this->name . '.' . $ext;

        if (!$this->isExist($path)) {
            throw LogicException(
                `the template path "` . $path . '" does not exist.'
            );
        }

        return $path;
    }

    public function isExist(string $path): bool
    {
        return file_exists($path);
    }
}
