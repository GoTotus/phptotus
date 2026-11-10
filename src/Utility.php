<?php

namespace GoTotus\Totus;

use GoTotus\Totus\Dto\Balance;
use GoTotus\Totus\Dto\Authenticated;

class Utility
{
    private $totus;

    public function __construct(Client $totus)
    {
        $this->totus = $totus;
    }

    public function balance(): Balance
    {
        return $this->totus->balance();
    }

    public function authenticated(): Authenticated
    {
        return new Authenticated($this->totus->request('GET', '/authenticated'));
    }
}
