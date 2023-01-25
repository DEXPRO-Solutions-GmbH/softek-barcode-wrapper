<?php
declare(strict_types=1);

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper\Exception;

class SoftekProcessImageException extends \Exception
{
    /**
     * @param int $result should be the returned value of the scanBarCode function
     * @param string $pathToFile
     */
    public function __construct(int $result, string $pathToFile)
    {
        switch ($result) {
            case -1:
                $message = "Error opening file '$pathToFile'";
                break;
            case -2:
                $message = "BMP file '$pathToFile' is multi-plane";
                break;
            case -3:
                $message = "Invalid number of bits per sample for file '$pathToFile'";
                break;
            case -4:
                $message = "Memory allocation error by processing file '$pathToFile'";
                break;
            case -5:
                $message = "Invalid tif photometric property $pathToFile";
                break;
            case -6:
            case -7:
            case -8:
                $message = "Invalid license key while trying process $pathToFile";
                break;
            default :
                $message = "Unknown error code is returned by processing file '$pathToFile' for barcode detection";
        }

        parent::__construct($message, $result, null);
    }
}