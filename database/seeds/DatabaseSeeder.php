<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();
                $this->call(UsersTableSeeder::class);
                $this->call(AccountsTableSeeder::class);
		$this->call(UserAccountsTableSeeder::class);
		$this->call(ProdutoTableSeeder::class);
	}
}