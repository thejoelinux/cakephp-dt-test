<?php

use Cake\I18n\Number;

$results->select([
        'invoice_count' => $results->func()->count('Invoices.id'),
        'invoice_sum' => $results->func()->sum('Invoices.amount')
    ])
    ->leftJoinWith('Invoices')
    ->group('Customers.id');

foreach ($results as $result)
{
    $this->DataTables->prepareData([
        $result->id,
        h($result->name),
        $result->invoice_count,
        Number::currency($result->invoice_sum, 'USD'),
        $this->Html->link('Edit', ['action' => 'edit', $result->id])
    ]);
}
echo $this->DataTables->response();