<?php

/**
 * Autoload with Composer
 */
require_once __DIR__.'/vendor/autoload.php';

use HumanDirect\QrCode,
    HumanDirect\Renderer\GoogleChartsRenderer;

/**
 * Bootstrap the application
 */
$application = new QrCode('TrekkSoft', 100, 100);
$application->setRenderer(new GoogleChartsRenderer());

$qrCode = $application->generate();