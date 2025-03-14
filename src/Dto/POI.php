<?php

namespace GoTotus\Totus\Dto;

class POI
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function data(): array { return $this->data; }
    public function id(): int { return $this->data['id'] ?? 0; }
    public function latitude(): float { return $this->data['lat'] ?? NAN; }
    public function longitude(): float { return $this->data['lon'] ?? NAN; }
    public function geohash(): ?string { return $this->data['gh'] ?? null; }
    public function distance(): ?float { return $this->data['dist'] ?? null; }
    public function info(): array { return $this->data['info'] ?? []; }

    public function __toString(): string
    {
        return json_encode([
            'id' => $this->id(),
            'lat' => $this->latitude(),
            'lon' => $this->longitude(),
            'gh' => $this->geohash(),
            'dist' => $this->distance(),
            'info' => $this->info()
        ], JSON_PRETTY_PRINT);
    }
}