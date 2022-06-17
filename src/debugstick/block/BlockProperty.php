<?php

namespace debugstick\block;

class BlockPropety{

    private $name;
    private $propeties = [];

    public function __construct(string $name, array $propeties = []){
        $this->name = $name;
        $this->propeties = $propeties;
    }
}