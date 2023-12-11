<?php
// HTML to PDF library (e.g., mPDF or TCPDF) can be used here for better printing support.
// For simplicity, we will use the browser's print functionality in this example.

// Include the HTML template
include('process_printTicket.php');
?>

<script type="text/php">
    if ( isset($pdf) ) { 
        $pdf->page_script('
            if ($PAGE_COUNT > 1) {
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $size = 12;
                $pageText = "Page " . $PAGE_NUM . " of " . $PAGE_COUNT;
                $y = 15;
                $x = 520;
                $pdf->text($x, $y, $pageText, $font, $size);
            }
        ');
    }
</script>