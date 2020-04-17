<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice[]|\Cake\Collection\CollectionInterface $invoices
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoices index large-9 medium-8 columns content">
    <div>
        <select id="filter_comp">
            <option value="0">All</option>
            <option value="1">Unpaid</option>
            <option value="2">Paid</option>
        </select>
    </div>
    <?= $this->DataTables->render('Invoices') ?>
</div>

<script>
$(document).ready(function() {
    $('#dtInvoices').dataTable().fnSettings().aoDrawCallback.push( {
        "fn": function () {
            $("#filter_comp").on("change", function() {
                if($("#filter_comp").val() != 0) {
                    $('#dtInvoices').DataTable().columns(3).search(
                        $("#filter_comp").val());
                    console.log('hi there');
                } else {
                    // re-init the thing (TODO)
                }
                $('#dtInvoices').DataTable().draw();
            });
        },
        "sName": "status_filter"
    });
});
</script>