<?php

namespace App\Entity;

class Atmosphere
{
    protected $temperature;
    protected $pressure;
    protected $sea_level;
    protected $grnd_level;
    protected $humidity;


    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function setTemperature(float $value)
    {
        $this->temperature = $value;
    }

    public function getPressure(): float
    {
        return $this->pressure;
    }

    public function setPressure(float $value)
    {
        $this->pressure = $value;
    }

    public function getSeaLevel(): float
    {
        return $this->sea_level;
    }

    public function setSeaLevel(float $value)
    {
        $this->sea_level = $value;
    }

    public function getGrndLevel(): float
    {
        return $this->grnd_level;
    }

    public function setGrndLevel(float $value)
    {
        $this->grnd_level = $value;
    }

    public function getHumidity(): float
    {
        return $this->humidity;
    }

    public function setHumidity(float $value)
    {
        $this->humidity = $value;
    }

    public function getData(): array
    {
        return [
            'temperature' => $this->getTemperature(),
            'pressure' => $this->getPressure(),
            'sea_level' => $this->getSeaLevel(),
            'grnd_level' => $this->getGrndLevel(),
            'humidity' => $this->getHumidity()
        ];
    }

    public function setData(array $data)
    {
        $this->setTemperature($data['temp']);
        $this->setPressure($data['pressure']);
        $this->setSeaLevel($data['sea_level']);
        $this->setGrndLevel($data['grnd_level']);
        $this->setHumidity($data['humidity']);
    }
}
