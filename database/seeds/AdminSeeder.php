<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Admin;
        $admin->username = "admin";
        $admin->nama = "Rara";
        $admin->password = \Hash::make("admin123");
        $admin->save();

        $this->command->info("User Admin berhasil diinsert");

    }
}
