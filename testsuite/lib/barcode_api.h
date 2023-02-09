typedef void *PVOID;
typedef PVOID HANDLE;

HANDLE mtCreateBarcodeInstance() ;

char *mtSetLicenseKey(void *hBarcode, char *v) ;
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
short mtSetMultipleRead(void *hBarcode, short v) ;
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

