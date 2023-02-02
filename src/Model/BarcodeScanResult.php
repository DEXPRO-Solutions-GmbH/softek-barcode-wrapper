<?php
declare(strict_types=1);

namespace DexproSolutionsGmbh\SoftekBarcodeWrapper\Model;

/**
 * This class is to be used to represent the extracted barcode results from the barcode toolkit library.
 * Properties can only be set by passing them to the constructor, so custom classes should create by your own.
 */
class BarcodeScanResult
{
    /**
     * @var int
     */
    private int $page;

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
     * @param string $text
     * @param string $type
     * @param int $top
     * @param int $bottom
     * @param int $left
     * @param int $right
     */
    public function __construct(string $text, string $type, int $page, int $top, int $bottom, int $left, int $right)
    {
        $this->text = $text;
        $this->type = $type;
        $this->page = $page;
        $this->top = $top;
        $this->bottom = $bottom;
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getTop(): int
    {
        return $this->top;
    }

    /**
     * @return int
     */
    public function getLeft(): int
    {
        return $this->left;
    }

    /**
     * @return int
     */
    public function getBottom(): int
    {
        return $this->bottom;
    }

    /**
     * @return int
     */
    public function getRight(): int
    {
        return $this->right;
    }
}
