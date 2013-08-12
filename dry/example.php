<?php

// bad
class Car
{
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

// better
class Car
{
    const ENGINE_ON = 'STARTED';
    const ENGINE_OFF = 'STOPPED';

    public function startEngine()
    {
        if ($this->isEngineStarted()) {
            throw Exception('Engine is already running.');
        }

        $this->setEngine(self::ENGINE_ON);
    }

    public function stopEngine()
    {
        if (!$this->isEngineStarted()) {
            throw Exception('Engine is already off.');
        }

        $this->setEngine(self::ENGINE_OFF);
    }

    public function isEngineStarted()
    {
        return $this->engine === self::ENGINE_ON;
    }

    public function setEngine($engineState)
    {
        $this->engine = $engineState;
    }
}
