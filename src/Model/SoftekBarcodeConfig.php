<?php

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper\Model;


class SoftekBarcodeConfig
{
    /**
     * The file location for the code declarations of the library
     *
     * @var string
     */
    private string $headerFilePath;

    /**
     * The file location to the library source file
     *
     * @var string
     */
    private string $sourceFilePath;

    /**
     * The license key to run the interface
     *
     * @var string
     */
    private string $licenseKey;

    /**
     * @return string
     */
    public function getHeaderFilePath(): string
    {
        return $this->headerFilePath;
    }

    /**
     * @param string $headerFilePath
     */
    public function setHeaderFilePath(string $headerFilePath): void
    {
        $this->headerFilePath = $headerFilePath;
    }

    /**
     * @return string
     */
    public function getSourceFilePath(): string
    {
        return $this->sourceFilePath;
    }

    /**
     * @param string $sourceFilePath
     */
    public function setSourceFilePath(string $sourceFilePath): void
    {
        $this->sourceFilePath = $sourceFilePath;
    }

    /**
     * @return string
     */
    public function getLicenseKey(): string
    {
        return $this->licenseKey;
    }

    /**
     * @param string $licenseKey
     */
    public function setLicenseKey(string $licenseKey): void
    {
        $this->licenseKey = $licenseKey;
    }
}