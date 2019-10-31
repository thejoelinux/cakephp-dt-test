<?php
use Migrations\AbstractSeed;

/**
 * Customers seed.
 */
class CustomersSeed extends AbstractSeed
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
                'name' => 'John Smith',
                'description' => 'Honest cowboy',
                'created' => '2019-10-31 08:09:54',
                'modified' => '2019-10-31 08:09:54',
            ],
            [
                'id' => '2',
                'name' => 'Adam Cherry',
                'description' => 'Like cakes',
                'created' => '2019-10-31 08:10:19',
                'modified' => '2019-10-31 08:10:19',
            ],
            [
                'id' => '3',
                'name' => 'Sylvia Roberts',
                'description' => 'Can\'t help laughing',
                'created' => '2019-10-31 08:10:48',
                'modified' => '2019-10-31 08:10:48',
            ],
            [
                'id' => '4',
                'name' => 'Arthur Random',
                'description' => 'Arty knows what he wants',
                'created' => '2019-10-31 08:11:20',
                'modified' => '2019-10-31 08:11:20',
            ],
        ];

        $table = $this->table('customers');
        $table->insert($data)->save();
    }
}
