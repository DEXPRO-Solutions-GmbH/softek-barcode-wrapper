<?php

$root = dirname(__DIR__);
require $root . '/vendor/autoload.php';

use DexproSolutionsGmbh\SoftekBarcodeWrapper\Exception\SoftekInitializationException;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\Model\SoftekBarcodeConfig;
use DexproSolutionsGmbh\SoftekBarcodeWrapper\SoftekBarcodeAPI;

//configure this variables
$pathToImages = __DIR__. "/images";
$pattern = '*.*';
$config = new SoftekBarcodeConfig();
$config->setHeaderFilePath(__DIR__ . '/lib/barcode_api.h');
$config->setSourceFilePath(__DIR__ . '/lib/libbardecode.so');

// set here the decode License Key
//$config->setLicenseKey(base64_decode(''));

try {
    $api = new SoftekBarcodeAPI($config);

    foreach (glob_recursive($pathToImages,$pattern) as $fileName) {
        foreach ($api->processImage($fileName) as $barcodeScanResult) {
            echo $barcodeScanResult->getText() . " \t " . $barcodeScanResult->getType(). PHP_EOL;
        };
    };
} catch (SoftekInitializationException $e) {
    echo "Something went wrong " . $e->getMessage();
}

function glob_recursive($base, $pattern, $flags = 0) {
    $flags = $flags & ~GLOB_NOCHECK;

    if (substr($base, -1) !== DIRECTORY_SEPARATOR) {
        $base .= DIRECTORY_SEPARATOR;
    }

    $files = glob($base.$pattern, $flags);
    if (!is_array($files)) {
        $files = [];
    }

    $dirs = glob($base.'*', GLOB_ONLYDIR|GLOB_NOSORT|GLOB_MARK);
    if (!is_array($dirs)) {
        return $files;
    }

    foreach ($dirs as $dir) {
        $dirFiles = glob_recursive($dir, $pattern, $flags);
        $files = array_merge($files, $dirFiles);
    }

    return $files;
}
