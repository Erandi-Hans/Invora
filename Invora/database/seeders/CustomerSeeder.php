<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of realistic Sri Lankan/International names for seeding
        $firstNames = ['Kamal', 'Nimal', 'Sunil', 'Anula', 'Priyankara', 'Chaminda', 'Ruwan', 'Nuwan', 'Sahan', 'Dilshan', 'Kasun', 'Malith', 'Sanduni', 'Kavindya', 'Ishara', 'Thilina', 'Chathurika', 'Hasitha', 'Madhushani', 'Roshan'];
        $lastNames = ['Perera', 'Silva', 'Fernando', 'Jayanetti', 'Bandara', 'Rathnayake', 'Gunasekara', 'Herath', 'Wickramasinghe', 'Jayasinghe', 'Dissanayake', 'Kumara', 'Abeywickrama', 'Weerasinghe', 'Ranasinghe'];

        $streets = ['Main Street', 'Temple Road', 'Station Road', 'Galle Road', 'Kandy Road', 'Lake Road', 'New Town', 'Church Lane', 'Flower Road'];
        $cities = ['Colombo', 'Kandy', 'Galle', 'Kurunegala', 'Negombo', 'Matara', 'Gampaha', 'Ratnapura', 'Anuradhapura', 'Jaffna'];

        for ($i = 1; $i <= 100; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $name = $firstName . ' ' . $lastName;
            $email = strtolower($firstName . '.' . $lastName . $i . '@example.com');
            $phone = '07' . rand(0, 9) . rand(1000000, 9999999);
            $address = rand(1, 150) . ', ' . $streets[array_rand($streets)] . ', ' . $cities[array_rand($cities)];

            Customer::create([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
            ]);
        }
    }
}
