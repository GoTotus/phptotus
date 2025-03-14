<?php

namespace GoTotus\Totus\Errors;

class TotusClientError extends \Exception
{
    protected $statusCode;

    public function __construct(string $message, ?int $statusCode = null)
    {
        $this->statusCode = $statusCode;
        parent::__construct($statusCode ? "{$message} (Status: {$statusCode})" : $message);
    }

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }
}