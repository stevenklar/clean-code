<?php

class Car
{
    const ENGINE_STARTED = 'STARTED';

    const ENGINE_STOPPED = 'STOPPED';

    protected $engine;

    public function startEngine()
    {
        if ($this->isEngineStarted()) {
            throw Exception('Engine is already running.');
        }

        $this->setEngine(self::ENGINE_STARTED);
    }

    public function stopEngine()
    {
        if (!$this->isEngineStarted()) {
            throw Exception('Engine is already off.');
        }

        $this->setEngine(self::ENGINE_STOPPED);
    }

    private function isEngineStarted()
    {
        return self::ENGINE_STARTED == $this->getEngine();
    }

    protected function setEngine($engine)
    {
        $this->engine = $engine;
    }

    public function getEngine()
    {
        return $this->engine;
    }
}
