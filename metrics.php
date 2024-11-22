<?php
require_once 'vendor/autoload.php';

use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;

// Створення реєстратора метрик
$registry = new CollectorRegistry();
$counter = $registry->getCounter('app', 'requests_total', ['status']);

// Інкрементуємо лічильник
$counter->inc(['status' => 'success']);

// Віддаємо метрики у форматі Prometheus
$renderer = new RenderTextFormat();
echo $renderer->render($registry->getMetricFamilySamples());
