<?php

namespace App\Events\Color;

use Illuminate\Queue\SerializesModels;
use App\Models\Color;

/**
 * Class ColorCreated.
 */
class ColorCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $color;

    /**
     * @param $color
     */
    public function __construct(Color $color)
    {
        $this->color = $color;
    }
}
