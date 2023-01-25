<?php
declare(strict_types=1);

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper;

use DexproSolutionsGmbh\SoftekBarcodeWrapper\Exception\SoftekInitializationException;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Model\SoftekBarcodeConfig;
use FFI;

class SoftekBarcodeAPI
{
    /**
     * The foreign C API
     *
     * @var FFI
     */
    protected FFI $ffi;

    /**
     * The persistent instance of the barcode tool kit
     *
     * @var FFI\CData
     */
    protected FFI\CData $instance;

    /**
     * @param SoftekBarcodeConfig $configuration
     * @throws SoftekInitializationException If the license is invalid or the shared library is broken or not found
     */
    public function __construct(SoftekBarcodeConfig $configuration)
    {
        try {
            // init the c library with his declarations and source code
            $this->ffi = FFI::cdef(file_get_contents($configuration->getHeaderFilePath()), $configuration->getSourceFilePath());
            // create a persistent instance of the interface so that we can work with the same one during operations
            $this->instance = $this->ffi->mtCreateBarcodeInstance();

            // license the instance for further operations
            $this->ffi->mtSetLicenseKey($this->instance, $configuration->getLicenseKey());
        } catch (\Throwable $e) {
            throw new SoftekInitializationException($e->getMessage(), "", $e);
        }
    }

}