<?php
declare(strict_types=1);

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper;

use DexproSolutionsGmbh\SoftekBarcodeWrapper\Model\SoftekBarcodeConfig;
use FFI;

class SoftekBarcodeAPI
{
    /**
     * The foreign C API
     *
     * @var FFI
     */
    protected FFI $interface;

    /**
     * The persistent instance of the barcode tool kit
     *
     * @var FFI\CData
     */
    protected FFI\CData $instance;

    public function __construct(SoftekBarcodeConfig $configuration)
    {
        // init the c library with his declarations and source code
        $this->interface = FFI::cdef(file_get_contents($configuration->getHeaderFilePath()), $configuration->getSourceFilePath());

        // create a persistent instance of the interface so that we can work with the same one during operations
        $this->instance = $this->interface->mtCreateBarcodeInstance();

        // license the instance for further operations
        $this->interface->mtSetLicenseKey($this->instance, $configuration->getLicenseKey());
    }

}