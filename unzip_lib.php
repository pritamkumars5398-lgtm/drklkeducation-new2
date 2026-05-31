<?php
/**
 * Multi-Zip Extractor Helper for InfinityFree
 * 
 * Since InfinityFree enforces a strict 10MB limit on file sizes, the assets are 
 * split into three smaller zip files: revolution.zip, line-awesome.zip, and lib-others.zip.
 * 
 * This script extracts all three zip files and then cleans up.
 */

header('Content-Type: text/plain; charset=utf-8');

$zips = [
    'revolution.zip',
    'line-awesome.zip',
    'lib-others.zip'
];

echo "📂 InfinityFree Multi-Zip Asset Extractor\n";
echo "==========================================\n\n";

$all_success = true;

foreach ($zips as $zipName) {
    $zipFile = __DIR__ . '/' . $zipName;
    
    if (!file_exists($zipFile)) {
        echo "⚠️ Warning: $zipName not found on the server (skipping or already extracted).\n";
        continue;
    }
    
    echo "📦 Extracting $zipName... ";
    $zip = new ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        if ($zip->extractTo(__DIR__ . '/')) {
            $zip->close();
            echo "✅ Success!\n";
            
            // Delete the zip file after successful extraction
            unlink($zipFile);
            echo "   🗑️ Deleted $zipName archive.\n";
        } else {
            $zip->close();
            echo "❌ Failed to extract files!\n";
            $all_success = false;
        }
    } else {
        echo "❌ Could not open archive!\n";
        $all_success = false;
    }
}

echo "\n==========================================\n";
if ($all_success) {
    echo "🎉 ALL ASSETS SUCCESSFULLY EXTRACTED!\n";
    // Delete this unzip script for security
    unlink(__FILE__);
    echo "🔒 Deleted unzip script from the server for security.\n";
} else {
    echo "⚠️ Extraction finished with errors. Please check the warnings above.\n";
}
?>
