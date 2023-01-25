<?php
declare(strict_types=1);

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper;

use DexproSolutionsGmbh\SoftekBarcodeWrapper\Exception\SoftekInitializationException;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Exception\SoftekProcessImageException;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Model\BarcodeScanResult;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Model\SoftekBarcodeConfig;
use FFI;
use Throwable;

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
        } catch (Throwable $e) {
            throw new SoftekInitializationException($e->getMessage(), 0, $e);
        }
    }

    /**
     * Scan the specified image file for bar code strings and return the detected barcodes in the file as Objects.
     * Note that the function will stop when the first barcode is found in a document unless
     * the MultipleRead property is set to True
     * https://www.bardecode.com/en1/scanbarcode-scan-an-image-for-barcodes/
     *
     * @param string $pathToFile
     * @return BarcodeScanResult[]
     * @throws SoftekProcessImageException if an error occurs during extraction of the barcode from the InputFile
     */
    public function processImage(string $pathToFile): array
    {
        $result = $this->ffi->mtScanBarCode($this->instance, $pathToFile);
        if ($result < 0) {
            throw new SoftekProcessImageException($result, $pathToFile);
        }

        // if no barcodes detected return empty array
        if ($result <= 0) return [];

        return $this->extractScanResults($result);
    }


    /**
     * This method extract the information using the barcode toolkit. It is required to run FFI::mtScanBarcode before
     * this method to perform a legit request to the barcode toolkit interface.
     *
     * @param int $resultCount
     * @return BarcodeScanResult[]
     */
    private function extractScanResults(int $resultCount): array
    {
        $barcodeScanResults = [];
        for ($barcodeIndex = 1; $barcodeIndex <= $resultCount; $barcodeIndex++) {
            $barcodeScanResult = new BarcodeScanResult();
            // converting the cdate byte array type to a readable string
            $barcodeScanResult
                ->setText($this->ffiByteArrayToString($this->ffi->mtGetBarString($this->instance, $barcodeIndex)))
                ->setType($this->ffiByteArrayToString($this->ffi->mtGetBarStringType($this->instance, $barcodeIndex)));

            // switch type of variable to be confirmed with operating system
            $ffiType = (PHP_OS === 'Linux') ? "long" : "int";

            // declare cdata int / long types to pass by reference to position function
            $top = FFI::new($ffiType);
            $left = FFI::new($ffiType);
            $bottom = FFI::new($ffiType);
            $right = FFI::new($ffiType);

            $this->ffi->mtGetBarStringPos($this->instance, $barcodeIndex, FFI::addr($left), FFI::addr($top), FFI::addr($right), FFI::addr($bottom));

            // set referenced types
            $barcodeScanResult->setTop($top->cdata);
            $barcodeScanResult->setLeft($left->cdata);
            $barcodeScanResult->setBottom($bottom->cdata);
            $barcodeScanResult->setRight($right->cdata);

            $barcodeScanResults[] = $barcodeScanResult;
        }

        return $barcodeScanResults;
    }

    /**
     * Converts an FFI:CData<byteArray> to a readable string
     *
     * @param $byteArray
     * @return string
     */
    private function ffiByteArrayToString($byteArray): string
    {
        $charType = FFI::type('char*');
        $castedValue = FFI::cast($charType, $byteArray);
        return FFI::string($castedValue);
    }

    /**
     * will destroy the instance of the barcode tool kit
     */
    public function __destruct()
    {
        /* DestroyBarcodeInstance destroys an instance
         * of the barcode toolkit and releases any resources used by the toolkit.
         * This function only exists in the dll interface to the SDK.
         */
        if (PHP_OS == 'Windows') {
            if (isset($this->instance) && isset($this->ffi)) {
                $this->ffi->mtDestroyBarcodeInstance($this->instance);
            }
        }
    }

}