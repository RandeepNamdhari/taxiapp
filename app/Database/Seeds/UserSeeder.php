<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email'    => 'admin@gmail.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'phone'=>'1234567890',
            ],
            [
                'username' => 'randeep',
                'email'    => 'randeep@gmail.com',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'phone'=>'0987654321',
            ],
            // Add more user data here...
        ];

        // Using the DB class to insert data
        $this->db->table('users')->insertBatch($data);
    }
}
