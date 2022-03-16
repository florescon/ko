<?php

namespace App\Events\ModelProduct;

use Illuminate\Queue\SerializesModels;
use App\Models\ModelProduct;

/**
 * Class ModelProductRestored.
 */
class ModelProductRestored
{
    use SerializesModels;

    /**
     * @var
     */
    public $model_product;

    /**
     * @param $model_product
     */
    public function __construct(ModelProduct $model_product)
    {
        $this->model_product = $model_product;
    }
}
