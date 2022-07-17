<?php

namespace LoadBalancer\BalanceStrategies;
use LoadBalancer\Instance\Instance;

interface StrategyInterface
{
    public function balance(array $instances): Instance|null;
}
