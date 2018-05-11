<?php

namespace Lrf141\Rook;

use LogicException;

class Name{

    private $engine;

    private $name;

    private $folder;

    public function __construct(Engine $engine, string $name){
        $this->setEngine($engine);
        $this->setName($name);
    }


    public function setName(string $name)
    {
        $this->name = $name;

        $parts = explode('::', $this->name);

        if(count($parts) === 1)
        {
            $this->setFile($parts[0]);
        } elseif (count($parts) === 2) {
            $this->setFolder($parts[0]);
            $this->setFile($parts[1]);
        } else {
            throw new LogicException(
                'the template name "' . $this->name . '" is not valid.'
            );
        }

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function setFolder(string $folder): Name
    {
        $this->folder = $this->en
    }


}
