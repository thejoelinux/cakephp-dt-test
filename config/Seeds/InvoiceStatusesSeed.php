<?php
use Migrations\AbstractSeed;

/**
 * Invoices seed.
 */
class InvoiceStatusesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Paid',
                'created' => '2020-04-17 08:11:42',
                'modified' => '2020-04-17 08:11:42',
            ],
            [
                'id' => '2',
                'name' => 'Not paid',
                'created' => '2020-04-17 08:11:42',
                'modified' => '2020-04-17 08:11:42',
            ],
        ];

        $table = $this->table('invoice_statuses');
        $table->insert($data)->save();
    }
}