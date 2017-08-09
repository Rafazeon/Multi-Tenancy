<?php

use Illuminate\Database\Seeder;
use App\Models\Painel\Product;
class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
			'name' => 'Camiseta Nike',
			'description' => 'camiseta da nike 10',
			'number' => '123456',
			'active' => 1,
			'image' => 'djahdasuhasha.jpg',
			'category' => 'limpeza',
                        'account_id' => 1
        ]);
        
        Product::create([
			'name' => 'Camiseta Addidas',
			'description' => 'camiseta da addidas 20',
			'number' => '12345678',
			'active' => 1,
			'image' => 'djahdasuhasha.jpg',
			'category' => 'limpeza',
                        'account_id' => 2
        ]);
    }
}
