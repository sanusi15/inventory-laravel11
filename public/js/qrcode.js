let html5QRCodeScanner = new Html5QrcodeScanner("reader", {
    fps: 10,
    qrbox: {
        width: 200,
        height: 200,
    },
});

function onScanSuccess(decodedText, decodedResult) {
    // console.log(decodedResult);
    // redirect ke link hasil scan
    window.location.href = decodedResult.decodedText;

    // membersihkan scan area ketika sudah menjalankan
    // action diatas
    html5QRCodeScanner.clear();
}

// render qr code scannernya
html5QRCodeScanner.render(onScanSuccess);
