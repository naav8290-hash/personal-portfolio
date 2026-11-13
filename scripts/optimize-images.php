<?php

/**
 * Generate responsive WebP variants for the portfolio images.
 * Run once: php scripts/optimize-images.php
 */

function makeVariant(string $source, int $width, int $quality = 82): void
{
    $info = getimagesize($source);
    if ($info === false) {
        fwrite(STDERR, "Skipping unreadable image: {$source}\n");

        return;
    }

    [$srcWidth, $srcHeight] = $info;
    $width = min($width, $srcWidth);
    $height = (int) round($srcHeight * ($width / $srcWidth));

    $image = imagecreatefrompng($source);
    if ($image === false) {
        fwrite(STDERR, "Cannot decode PNG: {$source}\n");

        return;
    }

    $canvas = imagecreatetruecolor($width, $height);
    imagealphablending($canvas, false);
    imagesavealpha($canvas, true);
    imagecopyresampled($canvas, $image, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);

    $target = preg_replace('/\.png$/i', "-{$width}.webp", $source);
    imagewebp($canvas, $target, $quality);

    imagedestroy($canvas);
    imagedestroy($image);

    printf("%-58s %sx%s  %s KB\n", $target, $width, $height, number_format(filesize($target) / 1024));
}

$sources = [
    'public/assets/img/vina.png' => [480, 900],
    'public/assets/img/projects/access-internship.png' => [640, 1280],
    'public/assets/img/projects/bookingaja.png' => [640, 1280],
    'public/assets/img/projects/peterp-docs.png' => [640, 1280],
];

foreach ($sources as $source => $widths) {
    foreach ($widths as $width) {
        makeVariant($source, $width);
    }
}
