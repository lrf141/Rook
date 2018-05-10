<?php

namespace Lrf141\Rook;

use LogicException;
use Throwable;
use Exception;

class Template {

    private $engine;
    private $name;

    public function __construct(Engine $engine, string $name)
    {
        $this->engine = $engine;
        $this->name = $name;
    }


    public function render(array $data = []) 
    {
        try{
            $level = ob_get_level();
            ob_start();
            echo "hello\n"
?>
            <h1>hello, PHP template engine!!</h1>
<?php
            $content = ob_get_flush();
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
}
