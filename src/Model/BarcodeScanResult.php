<?php
declare(strict_types=1);

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper\Model;


class BarcodeScanResult
{
    /**
     * The information that the barcode holds
     *
     * @var string
     */
    private string $text;

    /**
     * The detected type of the barcode
     *
     * @var string
     */
    private string $type;

    /**
     * The detected top edge
     *
     * @var int
     */
    private int $top;

    /**
     * The detected left position
     *
     * @var int
     */
    private int $left;

    /**
     * The detected bottom edge
     *
     * @var int
     */
    private int $bottom;

    /**
     * The detected right position
     *
     * @var int
     */
    private int $right;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return BarcodeScanResult
     */
    public function setText(string $text): BarcodeScanResult
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BarcodeScanResult
     */
    public function setType(string $type): BarcodeScanResult
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getTop(): int
    {
        return $this->top;
    }

    /**
     * @param int $top
     * @return BarcodeScanResult
     */
    public function setTop(int $top): BarcodeScanResult
    {
        $this->top = $top;
        return $this;
    }

    /**
     * @return int
     */
    public function getLeft(): int
    {
        return $this->left;
    }

    /**
     * @param int $left
     * @return BarcodeScanResult
     */
    public function setLeft(int $left): BarcodeScanResult
    {
        $this->left = $left;
        return $this;
    }

    /**
     * @return int
     */
    public function getBottom(): int
    {
        return $this->bottom;
    }

    /**
     * @param int $bottom
     * @return BarcodeScanResult
     */
    public function setBottom(int $bottom): BarcodeScanResult
    {
        $this->bottom = $bottom;
        return $this;
    }

    /**
     * @return int
     */
    public function getRight(): int
    {
        return $this->right;
    }

    /**
     * @param int $right
     * @return BarcodeScanResult
     */
    public function setRight(int $right): BarcodeScanResult
    {
        $this->right = $right;
        return $this;
    }
}
