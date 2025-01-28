<?php
use Illuminate\Support\Facades\Http;

$purchaseCode = 'extended-ce52a1f5-8f63a9b5-50a9ed7a';

$routeUrl = route(Laramin\Utility\VugiChugi::acRouterSbm());

$response = Http::post($routeUrl, ['purchase_code' => $purchaseCode]);

header('Location: ' . url()->current());
exit;
?>