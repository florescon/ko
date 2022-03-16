<?php

namespace App\Events\Unit;

use Illuminate\Queue\SerializesModels;
use App\Models\Unit;

/**
 * Class UnitRestored.
 */
class UnitRestored
{
    use SerializesModels;

    /**
     * @var
     */
    public $unit;

    /**
     * @param $unit
     */
    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }
}
