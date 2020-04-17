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
        $table->addColumn('status', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after' => 'amount'
        ]);
        $table->update();
    }
}
