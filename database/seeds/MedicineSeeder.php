<?php

use App\Medicine;
use App\Coustomers;
use App\User;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Integer as TypesInteger;
use Ramsey\Uuid\Type\Integer;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicine::truncate();
        Coustomers::truncate();
        $faker = \Faker\Factory::create();
        User::Create([
            'name'=>'Admin',
            'email'=>'n@n.com',
            'password'=>'12345678',
        ]);
        for ($i = 0; $i < 100; $i++)
        {
            Medicine::create([
                'name'=>$faker->name,
                'ts'=>$faker->numberBetween(1,100),
                'ns'=>$faker->numberBetween(1,100),
                'cs'=>$faker->numberBetween(1,100),
                'price'=>$faker->numberBetween(1,100),
                'mrp'=>$faker->numberBetween(1,100),
                'exdate'=>$faker->date,
                'orderstatus'=>'N',
            ]);
            Coustomers::create([
                'name'=>$faker->name,
                'mobile_no'=>$faker->numberBetween(1111111111,9999999999),
                'address'=>$faker->address,
                'imgname'=>$faker->imageUrl(),
                'status'=>'1',
            ]);
        }

    }
}
