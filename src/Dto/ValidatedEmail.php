<?php

namespace GoTotus\Totus\Dto;

class ValidatedEmail
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function email(): string { return $this->data['email']; }
    public function result(): bool { return $this->data['result'] === 'PASSED'; }
    public function score(): int { return $this->data['score']; }
    public function mailServers(): array { return $this->data['mail_servers']; }
    public function requestedLevel(): string { return $this->data['requested_level']; }
    public function data(): array { return $this->data; }

    public function __toString(): string
    {
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}