<?php

namespace App\Events\Size;

use Illuminate\Queue\SerializesModels;
use App\Models\Size;

/**
 * Class SizeCreated.
 */
class SizeCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $size;

    /**
     * @param $size
     */
    public function __construct(Size $size)
    {
        $this->size = $size;
    }
}
