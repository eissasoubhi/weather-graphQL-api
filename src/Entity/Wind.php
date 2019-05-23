<?php

namespace App\Entity;

class Wind
{
    protected $speed;
    protected $degree;

    public function getSpeed(): float
    {
        return $this->speed;
    }

    public function setSpeed(float $value)
    {
        $this->speed = $value;
    }

    public function getDegree(): float
    {
        return $this->degree;
    }

    public function setDegree(float $value)
    {
        $this->degree = $value;
    }

    public function getData(): array
    {
        return [
            'speed' => $this->getSpeed(),
            'degree' => $this->getDegree()
        ];
    }

    public function setData(array $data)
    {
        $this->setSpeed($data['speed']);
        $this->setDegree($data['deg']);
    }
}
