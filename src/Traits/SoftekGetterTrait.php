<?php
declare(strict_types=1);

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper\Traits;

use FFI\CData;

/**
 * This trait implements getter methods on the ffi object wrapped by this library.
 * Be sure that the global properties instance and ffi are declared and usable.
 * Be sure that {@link SoftekSetterTrait::setLicenseKey()} is called before any getter is used.
 * Notice: Most times getter functions within the barcode tool kit requires a premature function call of mtScanBarCode
 * @internal
 */
trait SoftekGetterTrait
{

    /**
     * Will return the included information for the given barcode index.
     * Please make sure that you perform a scan process on an image with the ffi instance before trying to get the barcode
     * including information.
     *
     * @param int $barcodeIndex
     * @return CData as ByteArray
     */
    private function getBarcodeString(int $barcodeIndex): CData
    {
        return $this->ffi->mtGetBarString($this->instance, $barcodeIndex);
    }

    /**
     * Will return the detected barcode type for the given detected barcode index.
     * Please make sure that you perform a scan process on an image with the ffi instance before trying to get the barcode
     * including information.
     *
     * @param int $barcodeIndex
     * @return CData as ByteArray
     */
    private function getBarcodeType(int $barcodeIndex): CData
    {
        return $this->ffi->mtGetBarStringType($this->instance, $barcodeIndex);
    }

    /**
     * @param int $barcodeIndex
     * @param CData $left
     * @param CData $top
     * @param CData $right
     * @param CData $bottom
     * @return int pageNo
     */
    private function getBarcodePosition(int $barcodeIndex, CData $left, CData $top, CData $right, CData $bottom): int
    {
        return $this->ffi->mtGetBarStringPos($this->instance, $barcodeIndex, $left, $top, $right, $bottom);
    }
}