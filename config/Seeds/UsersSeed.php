<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {

        $hash = new DefaultPasswordHasher();
        $data = [
            "name" => "Carla Janet",
            "email" => "carlajan82@gmail.com",
            "phone" => "617483943",
            "password" => $hash->hash("admin@123")
        ];

        $table = $this->table('tbl_users');
        $table->insert($data)->save();
    }
}
