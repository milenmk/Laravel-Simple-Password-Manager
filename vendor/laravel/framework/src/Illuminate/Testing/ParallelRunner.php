<?php

namespace Illuminate\Testing;

use Illuminate\Testing\Concerns\RunsInParallel;
use ParaTest\Runners\PHPUnit\RunnerInterface;

if (interface_exists(\ParaTest\RunnerInterface::class)) {
    class ParallelRunner implements \ParaTest\RunnerInterface
    {
        use RunsInParallel;

        /**
         * Runs the test suite.
         *
         * @return int
         */
        public function run(): int
        {
            return $this->execute();
        }
    }
} else {
    class ParallelRunner implements RunnerInterface
    {
        use RunsInParallel;

        /**
         * Runs the test suite.
         *
         * @return void
         */
        public function run(): void
        {
            $this->execute();
        }
    }
}
