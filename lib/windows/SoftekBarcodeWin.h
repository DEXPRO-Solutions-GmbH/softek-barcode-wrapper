typedef void *PVOID;
typedef PVOID HANDLE;

HANDLE mtCreateBarcodeInstance() ;
char *mtSetLicenseKey(void *hBarcode, char *v) ;
char *mtGetLicenseKey(void *hBarcode) ;
short mtScanBarCode(void *hBarcode, char *file);
unsigned char *mtGetBarString(void *hBarcode, int n);
int mtGetBarStringPos(void *hBarcode, int n, long *pTopLeftX, long *pTopLeftY, long *pBotRightX, long *pBotRightY);
unsigned char *mtGetBarStringType(void *hBarcode, int n);
int mtGetLastError(void *hBarcode) ;
short mtSetReadCodabar(void *hBarcode, short v) ;
short mtSetReadCode128(void *hBarcode, short v) ;
short mtSetReadCode25(void *hBarcode, short v) ;
short mtSetReadCode25ni(void *hBarcode, short v) ;
short mtSetReadCode39(void *hBarcode, short v) ;
short mtSetReadCode93(void *hBarcode, short v) ;
short mtSetReadDataMatrix(void *hBarcode, short v) ;
short mtSetReadDatabar(void *hBarcode, short v) ;
short mtSetReadEAN13(void *hBarcode, short v) ;
short mtSetReadEAN13Supplemental(void *hBarcode, short v) ;
short mtSetReadEAN8(void *hBarcode, short v) ;
short mtSetReadMicroPDF417(void *hBarcode, short v) ;
short mtSetReadNumeric(void *hBarcode, short v) ;
short mtSetReadPDF417(void *hBarcode, short v) ;
short mtSetReadPatchCodes(void *hBarcode, short v) ;
short mtSetReadQRCode(void *hBarcode, short v) ;
short mtSetReadShortCode128(void *hBarcode, short v) ;
short mtSetReadUPCA(void *hBarcode, short v) ;
short mtSetReadUPCE(void *hBarcode, short v) ;



/*
int mtScanBarCode(void *hBarcode, char *file);
int mtScanBarCodeFromString(void *hBarcode, unsigned char* ptr, size_t sz);
unsigned char *mtGetBarString(void *hBarcode, int n);
int mtGetBarStringPos(void *hBarcode, int n, long *pTopLeftX, long *pTopLeftY, long *pBotRightX, long *pBotRightY);
short mtGetPageNo(void *hBarcode);
int mtGetBarStringPage(void *hBarcode, int n);
int mtGetBarStringDirection(void *hBarcode, int n);
int mtGetBarStringQualityScore(void *hBarcode, int n);
int mtGetBarStringA(void *hBarcode, int n, char *buffer, int bufSize);
unsigned char *mtGetBarStringType(void *hBarcode, int n);
void mtDestroyBarcodeInstance(void *hBarcode);
int mtLoadXMLSettings (void *hBarcode, char *filePath, int silent);
int mtScanBarCodeFromArray(void *hBarcode, unsigned char *data, int w, int h, int bitsPixel);
short mtSet2DTimeOutPcnt(void *hBarcode, short v) ;
short mtSetAllowDuplicateValues(void *hBarcode, short v) ;
short mtSetBarcodesAtTopOfPage(void *hBarcode, short v) ;
short mtSetBiWidthMaxRatio(void *hBarcode, short v) ;
short mtSetBitmapResolution(void *hBarcode, short v) ;
short mtSetCodabarMaxVariance(void *hBarcode, short v) ;
short mtSetCode128DebugMode(void *hBarcode, short v) ;
short mtSetCode128Lenient(void *hBarcode, short v) ;
short mtSetCode128SearchLevel(void *hBarcode, short v) ;
short mtSetCode25Checksum(void *hBarcode, short v) ;
short mtSetCode25MinOccurrenceLength(void *hBarcode, short v) ;
short mtSetCode25PitchVariation(void *hBarcode, short v) ;
short mtSetCode39Checksum(void *hBarcode, short v) ;
short mtSetCode39MaxRatioPcnt(void *hBarcode, short v) ;
short mtSetCode39NeedStartStop(void *hBarcode, short v) ;
short mtSetCode39PitchVariation(void *hBarcode, short v) ;
short mtSetColorChunks(void *hBarcode, short v) ;
short mtSetColorProcessingLevel(void *hBarcode, short v) ;
short mtSetColorThreshold(void *hBarcode, short v) ;
short mtSetConvertUPCEToEAN13(void *hBarcode, short v) ;
short mtSetDataMatrixAutoUTF8(void *hBarcode, short v) ;
short mtSetDataMatrixFinderGapTolerance(void *hBarcode, short v) ;
char *mtSetDataMatrixParams(void *hBarcode, char *v) ;
short mtSetDataMatrixRectangleSupport(void *hBarcode, short v) ;
short mtSetDataMatrixSearchLevel(void *hBarcode, short v) ;
short mtSetDatabarOptions(void *hBarcode, short v) ;
short mtSetDeskewAfterNormalScan(void *hBarcode, short v) ;
short mtSetDeskewMode(void *hBarcode, short v) ;
short mtSetDespeckle(void *hBarcode, short v) ;
short mtSetDotDataMatrixSupport(void *hBarcode, short v) ;
short mtSetEdgeThreshold(void *hBarcode, short v) ;
short mtSetEncoding(void *hBarcode, short v) ;
short mtSetErrorCorrection(void *hBarcode, short v) ;
short mtSetExtendedCode39(void *hBarcode, short v) ;
short mtSetFastScanLineJump(void *hBarcode, short v) ;
short mtSetFilePathEncoding(void *hBarcode, short v) ;
short mtSetFixedLengthCode25(void *hBarcode, short v) ;
short mtSetGammaCorrection(void *hBarcode, short v) ;
short mtSetLineJump(void *hBarcode, short v) ;
short mtSetMaxBarcodesPerPage(void *hBarcode, short v) ;
short mtSetMaxHitHeightRatio(void *hBarcode, short v) ;
short mtSetMaxLength(void *hBarcode, short v) ;
short mtSetMaxRectOverlap(void *hBarcode, short v) ;
short mtSetMaxThreads(void *hBarcode, short v) ;
short mtSetMedianFilter(void *hBarcode, short v) ;
short mtSetMedianFilterBias(void *hBarcode, short v) ;
short mtSetMedianFilterLevel(void *hBarcode, short v) ;
short mtSetMinLength(void *hBarcode, short v) ;
short mtSetMinOccurrence(void *hBarcode, short v) ;
short mtSetMinResyncs(void *hBarcode, short v) ;
short mtSetMinSeparation(void *hBarcode, short v) ;
short mtSetMinSpaceBarWidth(void *hBarcode, short v) ;
short mtSetMinThresholdDiff(void *hBarcode, short v) ;
short mtSetMultipleRead(void *hBarcode, short v) ;
short mtSetNoiseReduction(void *hBarcode, short v) ;
short mtSetPDF417AutoUTF8(void *hBarcode, short v) ;
short mtSetPDF417ChannelMode(void *hBarcode, short v) ;
short mtSetPDF417ChannlMode(void *hBarcode, short v) ;
short mtSetPDF417Debug(void *hBarcode, short v) ;
short mtSetPDF417MacroEscapeBackslash(void *hBarcode, short v) ;
short mtSetPageNo(void *hBarcode, short v) ;
short mtSetPatchCodeMinOccurrence(void *hBarcode, short v) ;
char *mtSetPattern(void *hBarcode, char *v) ;
short mtSetPdfBpp(void *hBarcode, short v) ;
short mtSetPdfDpi(void *hBarcode, short v) ;
short mtSetPdfImageExtractOptions(void *hBarcode, short v) ;
short mtSetPdfImageOnly(void *hBarcode, short v) ;
short mtSetPdfImageRasterOptions(void *hBarcode, short v) ;
short mtSetPdfLocking(void *hBarcode, short v) ;
short mtSetPdfMaxMem(void *hBarcode, short v) ;
char *mtSetPdfPassword(void *hBarcode, char *v) ;
short mtSetPhotometric(void *hBarcode, short v) ;
short mtSetPrefOccurrence(void *hBarcode, short v) ;
short mtSetQRCodeAutoMedianFilter(void *hBarcode, short v) ;
short mtSetQRCodeAutoUTF8(void *hBarcode, short v) ;
short mtSetQRCodeBWAutoMedianFilter(void *hBarcode, short v) ;
short mtSetQRCodeByteMode(void *hBarcode, short v) ;
short mtSetQRCodeFinderTolerance(void *hBarcode, short v) ;
short mtSetQRCodeKanjiMode(void *hBarcode, short v) ;
short mtSetQRCodeReadInverted(void *hBarcode, short v) ;
short mtSetQualityMinHeight(void *hBarcode, short v) ;
short mtSetQualityPrefOccurrencePercent(void *hBarcode, short v) ;
short mtSetQuietZoneSize(void *hBarcode, short v) ;
short mtSetQuotedPrintableCharSet(void *hBarcode, short v) ;
short mtSetReadCodabar(void *hBarcode, short v) ;
short mtSetReadCode128(void *hBarcode, short v) ;
short mtSetReadCode25(void *hBarcode, short v) ;
short mtSetReadCode25ni(void *hBarcode, short v) ;
short mtSetReadCode39(void *hBarcode, short v) ;
short mtSetReadCode93(void *hBarcode, short v) ;
short mtSetReadDataMatrix(void *hBarcode, short v) ;
short mtSetReadDatabar(void *hBarcode, short v) ;
short mtSetReadEAN13(void *hBarcode, short v) ;
short mtSetReadEAN13Supplemental(void *hBarcode, short v) ;
short mtSetReadEAN8(void *hBarcode, short v) ;
short mtSetReadMicroPDF417(void *hBarcode, short v) ;
short mtSetReadNumeric(void *hBarcode, short v) ;
short mtSetReadPDF417(void *hBarcode, short v) ;
short mtSetReadPatchCodes(void *hBarcode, short v) ;
short mtSetReadQRCode(void *hBarcode, short v) ;
short mtSetReadShortCode128(void *hBarcode, short v) ;
short mtSetReadUPCA(void *hBarcode, short v) ;
short mtSetReadUPCE(void *hBarcode, short v) ;
short mtSetRectUnits(void *hBarcode, short v) ;
short mtSetReportUnreadBarcodes(void *hBarcode, short v) ;
short mtSetResyncChars(void *hBarcode, short v) ;
short mtSetResyncLinearBarcodes(void *hBarcode, short v) ;
short mtSetResyncRows(void *hBarcode, short v) ;
short mtSetRotateBy45IfNoBarcode(void *hBarcode, short v) ;
short mtSetRotateIfNoBarcode(void *hBarcode, short v) ;
short mtSetScanDirection(void *hBarcode, short v) ;
short mtSetShortCode128MinLength(void *hBarcode, short v) ;
short mtSetShow2DCornersInResults(void *hBarcode, short v) ;
short mtSetShowCheckDigit(void *hBarcode, short v) ;
short mtSetShowCodabarStartStop(void *hBarcode, short v) ;
short mtSetSkewLineJump(void *hBarcode, short v) ;
short mtSetSkewSpeed(void *hBarcode, short v) ;
short mtSetSkewTolerance(void *hBarcode, short v) ;
short mtSetSkewedDataMatrix(void *hBarcode, short v) ;
short mtSetSkewedLinear(void *hBarcode, short v) ;
short mtSetTifSplitMode(void *hBarcode, short v) ;
char *mtSetTifSplitPath(void *hBarcode, char *v) ;
int mtSetTimeOut(void *hBarcode, int v) ;
short mtSetTwoDTimeOutPcnt(void *hBarcode, short v) ;
short mtSetUnread1DMinBars(void *hBarcode, short v) ;
short mtSetUnread1DMinHeight(void *hBarcode, short v) ;
short mtSetUseFastScan(void *hBarcode, short v) ;
short mtSetUseGeneric1D(void *hBarcode, short v) ;
short mtSetUseOldCode128Algorithm(void *hBarcode, short v) ;
short mtSetUseOverSampling(void *hBarcode, short v) ;
short mtSetUseRunCache(void *hBarcode, short v) ;
short mtSetUseScaledFaxCoords(void *hBarcode, short v) ;
short mtSetWeightLongerBarcodes(void *hBarcode, short v) ;
short mtSetSkewedDatamatrix(void *hBarcode, short v) ;
short mtSetPdf417Debug(void *hBarcode, short v) ;
short mtSetPdf417ChannelMode(void *hBarcode, short v) ;
short mtSetQrCodeReadInverted(void *hBarcode, short v) ;
short mtSetPdf417AutoUTF8(void *hBarcode, short v) ;
short mtSetPdf417MacroEscapeBackslash(void *hBarcode, short v) ;
char *mtSetLicenseKey(void *hBarcode, char *v) ;
short mtGet2DTimeOutPcnt(void *hBarcode) ;
short mtGetAllowDuplicateValues(void *hBarcode) ;
short mtGetBarcodesAtTopOfPage(void *hBarcode) ;
short mtGetBiWidthMaxRatio(void *hBarcode) ;
short mtGetBitmapResolution(void *hBarcode) ;
short mtGetCodabarMaxVariance(void *hBarcode) ;
short mtGetCode128DebugMode(void *hBarcode) ;
short mtGetCode128Lenient(void *hBarcode) ;
short mtGetCode128SearchLevel(void *hBarcode) ;
short mtGetCode25Checksum(void *hBarcode) ;
short mtGetCode25MinOccurrenceLength(void *hBarcode) ;
short mtGetCode25PitchVariation(void *hBarcode) ;
short mtGetCode39Checksum(void *hBarcode) ;
short mtGetCode39MaxRatioPcnt(void *hBarcode) ;
short mtGetCode39NeedStartStop(void *hBarcode) ;
short mtGetCode39PitchVariation(void *hBarcode) ;
short mtGetColorChunks(void *hBarcode) ;
short mtGetColorProcessingLevel(void *hBarcode) ;
short mtGetColorThreshold(void *hBarcode) ;
short mtGetConvertUPCEToEAN13(void *hBarcode) ;
short mtGetDataMatrixAutoUTF8(void *hBarcode) ;
short mtGetDataMatrixFinderGapTolerance(void *hBarcode) ;
char *mtGetDataMatrixParams(void *hBarcode) ;
short mtGetDataMatrixRectangleSupport(void *hBarcode) ;
short mtGetDataMatrixSearchLevel(void *hBarcode) ;
short mtGetDatabarOptions(void *hBarcode) ;
short mtGetDeskewAfterNormalScan(void *hBarcode) ;
short mtGetDeskewMode(void *hBarcode) ;
short mtGetDespeckle(void *hBarcode) ;
short mtGetDotDataMatrixSupport(void *hBarcode) ;
short mtGetEdgeThreshold(void *hBarcode) ;
short mtGetEncoding(void *hBarcode) ;
short mtGetErrorCorrection(void *hBarcode) ;
short mtGetExtendedCode39(void *hBarcode) ;
short mtGetFastScanLineJump(void *hBarcode) ;
short mtGetFilePathEncoding(void *hBarcode) ;
short mtGetFixedLengthCode25(void *hBarcode) ;
short mtGetGammaCorrection(void *hBarcode) ;
short mtGetLineJump(void *hBarcode) ;
short mtGetMaxBarcodesPerPage(void *hBarcode) ;
short mtGetMaxHitHeightRatio(void *hBarcode) ;
short mtGetMaxLength(void *hBarcode) ;
short mtGetMaxRectOverlap(void *hBarcode) ;
short mtGetMaxThreads(void *hBarcode) ;
short mtGetMedianFilter(void *hBarcode) ;
short mtGetMedianFilterBias(void *hBarcode) ;
short mtGetMedianFilterLevel(void *hBarcode) ;
short mtGetMinLength(void *hBarcode) ;
short mtGetMinOccurrence(void *hBarcode) ;
short mtGetMinResyncs(void *hBarcode) ;
short mtGetMinSeparation(void *hBarcode) ;
short mtGetMinSpaceBarWidth(void *hBarcode) ;
short mtGetMinThresholdDiff(void *hBarcode) ;
short mtGetMultipleRead(void *hBarcode) ;
short mtGetNoiseReduction(void *hBarcode) ;
short mtGetPDF417AutoUTF8(void *hBarcode) ;
short mtGetPDF417ChannelMode(void *hBarcode) ;
short mtGetPDF417ChannlMode(void *hBarcode) ;
short mtGetPDF417Debug(void *hBarcode) ;
short mtGetPDF417MacroEscapeBackslash(void *hBarcode) ;
short mtGetPageNo(void *hBarcode) ;
short mtGetPatchCodeMinOccurrence(void *hBarcode) ;
char *mtGetPattern(void *hBarcode) ;
short mtGetPdfBpp(void *hBarcode) ;
short mtGetPdfDpi(void *hBarcode) ;
short mtGetPdfImageExtractOptions(void *hBarcode) ;
short mtGetPdfImageOnly(void *hBarcode) ;
short mtGetPdfImageRasterOptions(void *hBarcode) ;
short mtGetPdfLocking(void *hBarcode) ;
short mtGetPdfMaxMem(void *hBarcode) ;
char *mtGetPdfPassword(void *hBarcode) ;
short mtGetPhotometric(void *hBarcode) ;
short mtGetPrefOccurrence(void *hBarcode) ;
short mtGetQRCodeAutoMedianFilter(void *hBarcode) ;
short mtGetQRCodeAutoUTF8(void *hBarcode) ;
short mtGetQRCodeBWAutoMedianFilter(void *hBarcode) ;
short mtGetQRCodeByteMode(void *hBarcode) ;
short mtGetQRCodeFinderTolerance(void *hBarcode) ;
short mtGetQRCodeKanjiMode(void *hBarcode) ;
short mtGetQRCodeReadInverted(void *hBarcode) ;
short mtGetQualityMinHeight(void *hBarcode) ;
short mtGetQualityPrefOccurrencePercent(void *hBarcode) ;
short mtGetQuietZoneSize(void *hBarcode) ;
short mtGetQuotedPrintableCharSet(void *hBarcode) ;
short mtGetReadCodabar(void *hBarcode) ;
short mtGetReadCode128(void *hBarcode) ;
short mtGetReadCode25(void *hBarcode) ;
short mtGetReadCode25ni(void *hBarcode) ;
short mtGetReadCode39(void *hBarcode) ;
short mtGetReadCode93(void *hBarcode) ;
short mtGetReadDataMatrix(void *hBarcode) ;
short mtGetReadDatabar(void *hBarcode) ;
short mtGetReadEAN13(void *hBarcode) ;
short mtGetReadEAN13Supplemental(void *hBarcode) ;
short mtGetReadEAN8(void *hBarcode) ;
short mtGetReadMicroPDF417(void *hBarcode) ;
short mtGetReadNumeric(void *hBarcode) ;
short mtGetReadPDF417(void *hBarcode) ;
short mtGetReadPatchCodes(void *hBarcode) ;
short mtGetReadQRCode(void *hBarcode) ;
short mtGetReadShortCode128(void *hBarcode) ;
short mtGetReadUPCA(void *hBarcode) ;
short mtGetReadUPCE(void *hBarcode) ;
short mtGetRectUnits(void *hBarcode) ;
short mtGetReportUnreadBarcodes(void *hBarcode) ;
short mtGetResyncChars(void *hBarcode) ;
short mtGetResyncLinearBarcodes(void *hBarcode) ;
short mtGetResyncRows(void *hBarcode) ;
short mtGetRotateBy45IfNoBarcode(void *hBarcode) ;
short mtGetRotateIfNoBarcode(void *hBarcode) ;
short mtGetScanDirection(void *hBarcode) ;
short mtGetShortCode128MinLength(void *hBarcode) ;
short mtGetShow2DCornersInResults(void *hBarcode) ;
short mtGetShowCheckDigit(void *hBarcode) ;
short mtGetShowCodabarStartStop(void *hBarcode) ;
short mtGetSkewLineJump(void *hBarcode) ;
short mtGetSkewSpeed(void *hBarcode) ;
short mtGetSkewTolerance(void *hBarcode) ;
short mtGetSkewedDataMatrix(void *hBarcode) ;
short mtGetSkewedLinear(void *hBarcode) ;
short mtGetTifSplitMode(void *hBarcode) ;
char *mtGetTifSplitPath(void *hBarcode) ;
int mtGetTimeOut(void *hBarcode) ;
short mtGetTwoDTimeOutPcnt(void *hBarcode) ;
short mtGetUnread1DMinBars(void *hBarcode) ;
short mtGetUnread1DMinHeight(void *hBarcode) ;
short mtGetUseFastScan(void *hBarcode) ;
short mtGetUseGeneric1D(void *hBarcode) ;
short mtGetUseOldCode128Algorithm(void *hBarcode) ;
short mtGetUseOverSampling(void *hBarcode) ;
short mtGetUseRunCache(void *hBarcode) ;
short mtGetUseScaledFaxCoords(void *hBarcode) ;
short mtGetWeightLongerBarcodes(void *hBarcode) ;
short mtGetSkewedDatamatrix(void *hBarcode) ;
short mtGetPdf417Debug(void *hBarcode) ;
short mtGetPdf417ChannelMode(void *hBarcode) ;
short mtGetQrCodeReadInverted(void *hBarcode) ;
short mtGetPdf417AutoUTF8(void *hBarcode) ;
short mtGetPdf417MacroEscapeBackslash(void *hBarcode) ;
char *mtGetLicense(void *hBarcode) ;
int mtGetLastError(void *hBarcode) ;
double mtSetLowerRatio(void *hBarcode, double newValue);
double mtSetUpperRatio(void *hBarcode, double newValue);
int mtSetScanRect(void *hBarcode, long TopLeftX, long TopLeftY, long BottomRightX, long BottomRightY, int MappingMode);
int mtProcessXML(void *hBarcode, char *inputFilePath, char *outputFilePath, unsigned char silent);
int mtSaveResults(void *hBarcode, char *filePath);
int mtGetBlankPageCount(void *hBarcode);
int mtGetBlankPage(void *hBarcode, int n);
*/
