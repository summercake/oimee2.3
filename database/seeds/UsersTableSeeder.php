<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\Models\User::class, 100)->create();

        // 单独处理第一个用户的数据
        $user = App\Models\User::find(1);
        $user->name = 'jack';
        $user->email = 'jack@jack.com';
        $user->save();
    }
}
