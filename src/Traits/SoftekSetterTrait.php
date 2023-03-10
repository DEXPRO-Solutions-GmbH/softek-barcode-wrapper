<?php
declare(strict_types=1);

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper\Traits;

/**
 * This trait implements setter methods on the ffi object wrapped by this library.
 * Be sure that the global properties instance and ffi are declared and usable.
 * Be sure that {@link SoftekSetterTrait::setLicenseKey()} is
 * called before any setter is used.
 * @internal
 */
trait SoftekSetterTrait
{
    // region handling behaviours

    /**
     * If you set this property to false the barcode extraction will stop by the first barcode that is detected
     * by the method {@link SoftekBarcodeAPI::processImage()}. So be carefull using this property. Properties default is
     * true, that means extract all barcodes on the given document
     *
     * @param bool $active
     * @return void
     */
    public function setMultipleRead(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetMultipleRead($this->instance, $active);
    }
    // endregion

    // region legitimacy

    /**
     * Sets the license key to perform on the ffi instance correctly
     *
     * @param string $key
     * @return void
     */
    protected function setLicenseKey(string $key): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetLicenseKey($this->instance, $key);
    }

    // endregion

    // region barcodes

    /**
     * @param bool $active
     * @return void
     */
    public function setReadCodabar(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadCodabar($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadCode128(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadCode128($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadCode25(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadCode25($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadCode25ni(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadCode25ni($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadCode39(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadCode39($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadCode93(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadCode93($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadDataMatrix(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadDataMatrix($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadDatabar(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadDatabar($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadEAN13(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadEAN13($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadEAN13Supplemental(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadEAN13Supplemental($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadEAN8(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadEAN8($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadMicroPDF417(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadMicroPDF417($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadNumeric(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadNumeric($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadPDF417(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadPDF417($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadPatchCodes(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadPatchCodes($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadQRCode(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadQRCode($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadShortCode128(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadShortCode128($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadUPCA(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadUPCA($this->instance, $active);
    }

    /**
     * @param bool $active
     * @return void
     */
    public function setReadUPCE(bool $active): void
    {
        /** @psalm-suppress UndefinedMethod */
        $this->ffi->mtSetReadUPCE($this->instance, $active);
    }

    // endregion
}