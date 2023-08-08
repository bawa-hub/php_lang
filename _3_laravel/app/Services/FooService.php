<?php

namespace App\Services;

class FooService
{
    public function foo(BarService $barService)
    {
        return $barService->bar();
    }
}
