<?php

namespace App\Entity;

class Weather
{
    protected $date_timestamp;
    protected $date_text;
    protected $condition;
    protected $description;
    protected $cloudiness;
    protected $atmosphere;
    protected $wind;
    private $day;
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->day = $this->getRandomDay($data);
        $this->atmosphere = new Atmosphere();
        $this->wind = new Wind();
        $this->setData();
    }

    public function getDateTimestamp(): int
    {
        return $this->date_timestamp;
    }

    public function setDateTimestamp(int $value)
    {
        $this->date_timestamp = $value;
    }

    public function getDateText(): string
    {
        return $this->date_text;
    }

    public function setDateText(string $value)
    {
        $this->date_text = $value;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function setCondition(string $value)
    {
        $this->condition = $value;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $value)
    {
        $this->description = $value;
    }

    public function getCloudiness(): int
    {
        return $this->cloudiness;
    }

    public function setCloudiness(int $value)
    {
        $this->cloudiness = $value;
    }

    public function getAtmosphere(): Atmosphere
    {
        return $this->atmosphere;
    }

    public function setAtmosphere(array $data)
    {
        $this->atmosphere->setData($data);
    }

    public function getWind(): Wind
    {
        return $this->wind;
    }

    public function setWind(array $data)
    {
        $this->wind->setData($data);
    }

    public function getRandomDay(array $data): array
    {
        if (count($data['list']) == 0) return false;

        $day_index = rand(0, count($data['list']) - 1);

        return $data['list'][$day_index];
    }

    public function getData(): array
    {
        return [
            'date_timestamp' => $this->getDateTimestamp(),
            'date_text' => $this->getDateText(),
            'condition' => $this->getCondition(),
            'description' => $this->getDescription(),
            'cloudiness' => $this->getCloudiness(),
            'atmosphere' => $this->getAtmosphere(),
            'wind' => $this->getWind()
        ];
    }

    public function setData()
    {
        $this->setDateTimestamp($this->day['dt']);
        $this->setDateText($this->day['dt_txt']);
        $this->setCondition($this->day['weather'][0]['main'] ?? '');
        $this->setDescription($this->day['weather'][0]['description'] ?? '');
        $this->setCloudiness($this->day['clouds']['all']);
        $this->setAtmosphere($this->day['main']);
        $this->setWind($this->day['wind']);
    }
}
