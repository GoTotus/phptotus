<?php

namespace GoTotus\Totus\Dto;

class Balance
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function credits(): float
    {
        return (float)($this->data['credits'] ?? 0.0);
    }

    public function data(): array
    {
        return $this->data;
    }

    public function __toString(): string
    {
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}
