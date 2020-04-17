<?php
use Migrations\AbstractSeed;

/**
 * Invoices seed.
 */
class InvoicesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'The first sale ever',
                'customer_id' => '1',
                'amount' => '20',
                'invoice_status_id' => '2',
                'created' => '2019-10-31 08:11:42',
                'modified' => '2019-10-31 08:11:42',
            ],
            [
                'id' => '2',
                'name' => 'That was funny tough',
                'customer_id' => '3',
                'amount' => '15',
                'invoice_status_id' => '1',
                'created' => '2019-10-31 08:12:05',
                'modified' => '2019-10-31 08:12:05',
            ],
            [
                'id' => '3',
                'name' => 'It was not working',
                'customer_id' => '3',
                'amount' => '-15',
                'invoice_status_id' => '2',
                'created' => '2019-10-31 08:12:38',
                'modified' => '2019-10-31 08:12:38',
            ],
            [
                'id' => '4',
                'name' => 'A good item',
                'customer_id' => '4',
                'amount' => '10',
                'invoice_status_id' => '1',
                'status' => 'not paid',
                'created' => '2019-10-31 08:13:20',
                'modified' => '2019-10-31 08:13:20',
            ],
            [
                'id' => '5',
                'name' => 'He wants more',
                'customer_id' => '4',
                'amount' => '30',
                'invoice_status_id' => '2',
                'created' => '2019-10-31 08:13:51',
                'modified' => '2019-10-31 08:13:51',
            ],
        ];

        $table = $this->table('invoices');
        $table->insert($data)->save();
    }
}
