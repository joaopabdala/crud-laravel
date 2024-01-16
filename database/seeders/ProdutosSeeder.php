<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::create(
            [
                'nome' => 'aaaaa',
                'valor' => '20.00'
            ]
        );

        Produto::create([
            'nome' => 'Product 2',
            'valor' => '25.00'
        ]);
    
        Produto::create([
            'nome' => 'Product 3',
            'valor' => '30.00'
        ]);
    }
}
