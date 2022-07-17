<?php

namespace LoadBalancer\BalanceStrategies;
use LoadBalancer\Instance\Instance;
use LoadBalancer\BalanceStrategies\StrategyInterface;

class LoadLimitStrategy implements StrategyInterface
{
    const LOAD_LIMIT = 0.75;

    public function balance(array $instances): Instance|null
    {
        if(!empty($instances)){
            foreach ($instances as $instance) {
                if ($instance->getLoad() < self::LOAD_LIMIT) {
                    return $instance;
                }

                if (empty($result) || $instance->getLoad() < $result->getLoad()) {
                    $result = $instance;
                }
            }

            return $result;
        }

        return null;
    }

}
