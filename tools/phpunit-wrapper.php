<?php
/**
 * Picks phpunit.xml (PHPUnit 10+) or phpunit.legacy.xml (PHPUnit 7-9) from the installed PHPUnit major version.
 */
$root = dirname(__DIR__);
$phpunitPhar = $root . '/vendor/phpunit/phpunit/phpunit';
if (!is_file($phpunitPhar)) {
    fwrite(STDERR, "PHPUnit not found. Run: composer install\n");
    exit(1);
}

$php = PHP_BINARY;
$cmd = escapeshellarg($php) . ' ' . escapeshellarg($phpunitPhar) . ' --version 2>&1';
$output = shell_exec($cmd);
if (!preg_match('/PHPUnit (\d+)\./', (string) $output, $m)) {
    fwrite(STDERR, "Could not detect PHPUnit version.\n");
    exit(1);
}

$config = (int) $m[1] >= 10
    ? $root . '/phpunit.xml'
    : $root . '/phpunit.legacy.xml';

$bin = escapeshellarg($php) . ' ' . escapeshellarg($phpunitPhar);
$full = $bin . ' -c ' . escapeshellarg($config);
$extra = array_slice($argv, 1);
foreach ($extra as $arg) {
    $full .= ' ' . escapeshellarg($arg);
}

passthru($full, $exit);
exit((int) $exit);
