<?php

namespace GoTotus\Totus\Dto;

class Authenticated
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function authenticated(): bool
    {
        return (bool)($this->data['authenticated'] ?? false);
    }

    public function description(): string
    {
        return (string)($this->data['description'] ?? '');
    }

    public function tokenSm(): string
    {
        return (string)($this->data['token_sm'] ?? '');
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
