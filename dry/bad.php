<?php

class Car
{
    protected $engine;

    public function startEngine()
    {
        if ($this->engine == 'STARTED') {
            throw Exception('Engine is already running.');
        }

        $this->engine = 'STARTED';
    }

    public function stopEngine()
    {
        if ($this->engine != 'STARTED') {
            throw Exception('Engine is already off.');
        }

        $this->engine = 'STOPPED';
    }
}
