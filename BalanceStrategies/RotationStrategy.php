<?php

namespace LoadBalancer\BalanceStrategies;
use LoadBalancer\Instance\Instance;
use LoadBalancer\BalanceStrategies\StrategyInterface;

class RotationStrategy implements StrategyInterface
{

    private $index = 0;

    public function balance(array $instances): Instance|null
    {
        if (!empty($instances)) {
            $result = $instances[$this->index % count($instances)];
            $this->index++;
            return $result;
        }

        return null;
    }

}
