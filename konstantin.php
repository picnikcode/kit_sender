<?php require_once 'vendor/autoload.php'; echo "<pre>";

use RetailCrm\ApiClient;

$crmUrl = '';
$crmApiKey = '';

$crmApiVersion = ApiClient::V5;

$apiClient = new ApiClient($crmUrl, $crmApiKey, $crmApiVersion);

$crmCustomers = [];

$pagesTotalCount = null;
$limit = 100;
$page = 1;


do {
    $response = $apiClient->request->customersList([], $page, $limit);

    foreach ($response['customers'] as $responseCustomer) {

        if (!empty($responseCustomer['site'])) {

        	print_r($response); die();

        }

    }

    if (empty($pagesTotalCount)) {
        $pagesTotalCount = $response['pagination']['totalPageCount'];
    }

    sleep(1.5);

    $page++;
} while ($page <= $pagesTotalCount);