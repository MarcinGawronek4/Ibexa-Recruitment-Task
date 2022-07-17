<?php

namespace LoadBalancer;

use LoadBalancer\Request\Request;

require_once './autoload.php';

class LoadBalancer
{
    private $instances;
    private $algorythm;

    public function __construct(array $instances, $algorythm)
    {
        $this->instances = $instances;
        $this->algorythm = $algorythm;
    }

    public function handleRequest(Request $request)
    {
        $instance = $this->algorythm?->balance($this->instances);

        if (!empty($instance)) {
            try {
                $instance?->handleRequest($request);
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage(), $e->getCode());
            }
        }
    }
}
