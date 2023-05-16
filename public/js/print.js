function printPage(url) {
    var printWindow = window.open(url, '_blank');
    printWindow.onload = function() {
        printWindow.print();
    };
}
