<?php

namespace Lrf141\Rook;

use LogicException;
use Throwable;
use Exception;

class Template
{

    /**
     * @var Engine
     */
    private $engine;

    /**
     * @var Name
     */
    private $name;

    /**
     * @var array
     */
    private $sections = array();

    /**
     * @var array
     */
    private $data = array();

    /**
     * generate new Template Instance
     * @param Engine $engine
     * @param string $name
     */
    public function __construct(Engine $engine, string $name)
    {
        $this->engine = $engine;
        $this->name = new Name($name);
    }


    /**
     * rendering based on template 
     * @param array $data
     * @return string
     */
    public function render(array $data = []): string
    {

        //expands array as var
        $this->data($data);
        unset($data);
        extract($this->data);

        try {
            $level = ob_get_level();

            //dump buffer
            ob_start();
            include $this->path();
            
            $content = ob_get_clean();
            
            return $content;
        } catch (Throwable $e) {
            while (ob_get_level() > $level) {
                ob_end_clean();
            }
            throw $e;
        } catch (Exception $e) {
            while (ob_get_level() > $level) {
                ob_end_clean();
            }
            throw $e;
        }
    }

    /**
     * add data
     * @param array $data
     * @return array|none
     */
    public function data(array $data = null)
    {
        if (is_null($data)) {
            return $this->data;
        }

        $this->data = array_merge($this->data, $data);
    }

    /**
     * generate path
     * @return string
     */
    public function path(): string
    {
        $dir = $this->engine->getDirectory()->get();
        $ext = $this->engine->getFileExtension()->get();
        $name = $this->name->get();
        $path = $dir . '/' . $name . '.' . $ext;

        if (!$this->isExist($path)) {
            throw LogicException(
                `the template path "` . $path . '" does not exist.'
            );
        }

        return $path;
    }

    /**
     * check the path is true
     * @param string $path
     * @return bool
     */
    public function isExist(string $path): bool
    {
        return file_exists($path);
    }

    /**
     * escape render text using htmlspecialchars
     * @param string $contents 
     * @return string
     */
    public function escape(string $contents): string
    {
        return htmlspecialchars($contents, ENT_QUOTES);
    }
}
