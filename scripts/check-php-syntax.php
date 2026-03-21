<?php
/**
 * Fail CI/local if any src/test file has a PHP parse error or a forbidden function name (PHP reserved).
 */
$root = dirname(__DIR__);
$failed = false;

$reservedFunctionNames = [
  'match',
  'readonly',
];

$paths = [$root . '/src', $root . '/test'];
foreach ($paths as $dir) {
  if (!is_dir($dir)) {
    continue;
  }
  $it = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)
  );
  foreach ($it as $file) {
    if (strtolower($file->getExtension()) !== 'php') {
      continue;
    }
    $path = $file->getPathname();
    $out = [];
    $code = 0;
    exec(escapeshellarg(PHP_BINARY) . ' -l ' . escapeshellarg($path) . ' 2>&1', $out, $code);
    if ($code !== 0) {
      fwrite(STDERR, implode("\n", $out) . "\n");
      $failed = true;
    }
    $src = file_get_contents($path);
    foreach ($reservedFunctionNames as $word) {
      if (preg_match('/\bfunction\s+' . preg_quote($word, '/') . '\s*\(/', $src)) {
        fwrite(STDERR, "Forbidden function name `{$word}` (reserved in PHP 8+) in {$path}\n");
        $failed = true;
      }
    }
  }
}

exit($failed ? 1 : 0);
