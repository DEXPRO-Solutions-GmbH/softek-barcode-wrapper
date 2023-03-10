<?php

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper\Exception;

use Throwable;

class SoftekUnsupportedException extends \Exception
{
    public function __construct($message = "", Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }

}