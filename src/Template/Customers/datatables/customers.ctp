<?php
foreach ($results as $result)
{
    $this->DataTables->prepareData([
        $result->id,
        h($result->name),
        $this->Html->link('Edit', ['action' => 'edit', $result->id])
    ]);
}
echo $this->DataTables->response();