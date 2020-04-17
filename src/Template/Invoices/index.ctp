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
    <?= $this->DataTables->render('Invoices') ?>
</div>

<script>
$(document).ready(function() {
    $('#dtInvoices').dataTable().fnSettings().aoDrawCallback.push( {
        "fn": function () {
            if($("#filter_comp").html() === "") {
                $("#filter_comp").html('<select class="toggle_row_display custom-select pull-left">'
                    + '"<option value="0">All</option>"'
                    + '"<option value="Not paid">Not paid</option>"'
                    + '"<option value="Paid">Paid</option></select>');

                $(".toggle_row_display").on("change", function() {
                    if($(".toggle_row_display").val() != 0) {
                        $('#dtInvoices').DataTable().columns(3).search(
                            $(".toggle_row_display").val(), false, true, false
                        );
                        console.log('hi there');
                    } else {
                        // re-init the thing (TODO)
                    }
                    $('#dtInvoices').DataTable().draw();
                });
            }
        },
        "sName": "status_filter"
    });
});
</script>