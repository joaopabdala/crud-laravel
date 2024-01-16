<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nome' => 'John Doe',
                'email' => 'john@example.com',
                'endereco' => '123 Main St',
                'logradouro' => 'Main Street',
                'cep' => '12345',
                'bairro' => 'Cityville',
            ],
            [
                'nome' => 'Jane Smith',
                'email' => 'jane@example.com',
                'endereco' => '456 Oak Ave',
                'logradouro' => 'Oak Avenue',
                'cep' => '67890',
                'bairro' => 'Townsville',
            ],
            [
                'nome' => 'Bob Johnson',
                'email' => 'bob@example.com',
                'endereco' => '789 Pine Rd',
                'logradouro' => 'Pine Road',
                'cep' => '54321',
                'bairro' => 'Villageville',
            ],
        ];

        DB::table('clientes')->insert($data);
        
    }
}
