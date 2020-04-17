<?php
use Migrations\AbstractMigration;

class AddStatusToInvoices extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('invoices');
        $table->addColumn('invoice_status_id', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => false,
            'after' => 'amount'
        ]);
        $table->addForeignKey('invoice_status_id', 'invoice_statuses', 'id', 
                ['delete'=> 'RESTRICT', 'update'=> 'CASCADE']);
        $table->update();
    }
}
