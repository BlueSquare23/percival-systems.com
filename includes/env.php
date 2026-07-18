<?php
// Parses a .env file and populates $_ENV.
// Call once before reading $_ENV['KEY'].
function load_env(string $path): void {
    if (!file_exists($path)) return;
    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#') continue;
        $parts = explode('=', $line, 2);
        if (count($parts) !== 2) continue;
        $_ENV[trim($parts[0])] = trim($parts[1], " \t\"'");
    }
}
