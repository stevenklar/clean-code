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
class Engine {
    const ENGINE_ON = 'STARTED';
    const ENGINE_OFF = 'STOPPED';

    protected $state;

    public function start()
    {
        if ($this->isStarted()) {
            throw Exception('Engine is already running.');
        }

        $this->setState(self::ENGINE_ON);
    }

    public function stop()
    {
        if (!$this->isStarted()) {
            throw Exception('Engine is already off.');
        }

        $this->setState(self::ENGINE_OFF);
    }

    public function isStarted()
    {
        return $this->state === self::ENGINE_ON;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
}

class NewCar {

    /**
     * @var Engine
     */
    protected $engine;

    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function startEngine()
    {
        $this->engine->start();
    }

    public function stopEngine()
    {
        $this->engine->stop();
    }
}
