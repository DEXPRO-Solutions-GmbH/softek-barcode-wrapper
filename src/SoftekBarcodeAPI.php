<?php
declare(strict_types=1);

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper;

use DexproSolutionsGmbh\SoftekBarcodeWrapper\Exception\SoftekUnsupportedException;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Exception\SoftekInitializationException;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Exception\SoftekProcessImageException;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Model\BarcodeScanResult;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Model\SoftekBarcodeConfig;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Traits\SoftekGetterTrait;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Traits\SoftekPropertySetterTrait;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Traits\SoftekSetterTrait;
use FFI;
use Throwable;

class SoftekBarcodeAPI
{
    use SoftekSetterTrait;
    use SoftekGetterTrait;

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
            /** @psalm-suppress UndefinedMethod */
            $this->instance = $this->ffi->mtCreateBarcodeInstance();

            // license the instance for further operations
            $this->setLicenseKey($configuration->getLicenseKey());
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
     * @throws SoftekUnsupportedException
     */
    public function processImage(string $pathToFile, bool $multipleRead = true): array
    {
        // if user specifies that multiple read should disable, then we change the parameter
        if (!$multipleRead) {
            $this->setMultipleRead($multipleRead);
        }
        /** @psalm-suppress UndefinedMethod */
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
     * @throws SoftekUnsupportedException
     */
    private function extractScanResults(int $resultCount): array
    {
        $barcodeScanResults = [];
        for ($barcodeIndex = 1; $barcodeIndex <= $resultCount; $barcodeIndex++) {
            // converting the cdata byte array type to a readable string
            $text = self::ffiByteArrayToString($this->getBarcodeString($barcodeIndex));
            $type = self::ffiByteArrayToString($this->getBarcodeType($barcodeIndex));

            // switch type of variable to be confirmed with operating system
            $ffiType = $this->getIntegerType();

            // declare cdata int / long types to pass by reference to position function
            $top = FFI::new($ffiType);
            $left = FFI::new($ffiType);
            $bottom = FFI::new($ffiType);
            $right = FFI::new($ffiType);

            /** @psalm-suppress PossiblyNullArgument */
            $pageNo = $this->getBarcodePosition($barcodeIndex, FFI::addr($left), FFI::addr($top), FFI::addr($right), FFI::addr($bottom));

            /** @psalm-suppress UndefinedPropertyFetch */
            $barcodeScanResult = new BarcodeScanResult(
                $text,
                $type,
                $pageNo,
                $top->cdata,
                $bottom->cdata,
                $left->cdata,
                $right->cdata
            );

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
    private static function ffiByteArrayToString($byteArray): string
    {
        $charType = FFI::type('char*');
        /** @psalm-suppress PossiblyNullArgument */
        $castedValue = FFI::cast($charType, $byteArray);
        /** @psalm-suppress PossiblyNullArgument */
        return FFI::string($castedValue);
    }

    /**
     * This function returns the datatype relating to the operating system.
     * Notice this method only supports Windows and Linux OS.
     *
     * @return string
     * @throws SoftekUnsupportedException if an unknown operating system is detected
     */
    private function getIntegerType(): string
    {
        switch (PHP_OS) {
            case "WIN32":
            case "WINNT":
            case "Windows":
                return 'int';
            case "Linux":
                return "long";
            default:
                throw new SoftekUnsupportedException(
                    sprintf("No integer type is supported for operating system %s", PHP_OS)
                );
        }
    }


    /**
     * will destroy the instance of the barcode tool kit
     */
    public function __destruct()
    {
        /**
         * @psalm-suppress RedundantPropertyInitializationCheck
         * @psalm-suppress RedundantCondition
         */
        if (isset($this->instance) && isset($this->ffi)) {
            /** @psalm-suppress UndefinedMethod */
            $this->ffi->mtDestroyBarcodeInstance($this->instance);
        }
    }

}