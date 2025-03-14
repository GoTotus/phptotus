<?php

namespace GoTotus\Totus;

use GoTotus\Totus\Dto\ValidatedEmail;

class Validate
{
    private $totus;

    public function __construct(Client $totus)
    {
        $this->totus = $totus;
    }

    public function email(string $email, string $level = 'l4_dbs'): ValidatedEmail
    {
        $params = ['email' => $email, 'level' => $level];
        return new ValidatedEmail($this->totus->request('GET', '/validate/email', $params));
    }
}