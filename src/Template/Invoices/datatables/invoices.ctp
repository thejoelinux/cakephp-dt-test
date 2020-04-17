<?php

use Cake\I18n\Number;

foreach ($results as $result)
{
    $this->DataTables->prepareData([
        $result->id,
        h($result->name),
        $result->customer->name,
        $result->invoice_status->id,
        $result->invoice_status->name,
        Number::currency($result->amount, 'USD'),
        $this->Html->link('Edit', ['action' => 'edit', $result->id])
    ]);
}
echo $this->DataTables->response();