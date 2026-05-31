<?php
// Fix writable directory structure for CodeIgniter 4
$base = __DIR__;
$dirs = [
    'writable',
    'writable/cache',
    'writable/logs', 
    'writable/session',
    'writable/uploads',
    'writable/debugbar',
];

foreach ($dirs as $dir) {
    $path = $base . '/' . $dir;
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
        echo "✅ Created: $dir<br>";
    } else {
        chmod($path, 0755);
        echo "✔️ Exists: $dir<br>";
    }
}

echo "<br>WRITEPATH check: " . (is_dir($base.'/writable') ? "✅ writable directory OK!" : "❌ Still missing!");
echo "<br>Done! <a href='/'>Click here to load the site</a>";
