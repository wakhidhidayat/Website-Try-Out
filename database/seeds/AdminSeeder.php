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
        $admin = new \App\User;
        $admin->email = "Ferel_142@yahoo.com";
        $admin->nama = "Ferel";
        $admin->password = \Hash::make("ksk5thjaya");
        $admin->save();

        $admin1 = new \App\User;
        $admin1->email = "sagitawardhani@gmail.com";
        $admin1->nama = "Sagita";
        $admin1->password = \Hash::make("ksk5thjaya");
        $admin1->save();

        $admin2 = new \App\User;
        $admin2->email = "monikabtari@gmail.com";
        $admin2->nama = "Monika";
        $admin2->password = \Hash::make("ksk5thjaya");
        $admin2->save();

        $admin3 = new \App\User;
        $admin3->email = "fathimatu28@gmail.com";
        $admin3->nama = "Fathima";
        $admin3->password = \Hash::make("ksk5thjaya");
        $admin3->save();

        $admin4 = new \App\User;
        $admin4->email = "alimhaqqoni27@gmail.com";
        $admin4->nama = "Alima";
        $admin4->password = \Hash::make("ksk5thjaya");
        $admin4->save();

        $admin5 = new \App\User;
        $admin5->email = "riowicaksono983@gmail.com";
        $admin5->nama = "Rio";
        $admin5->password = \Hash::make("ksk5thjaya");
        $admin5->save();

        $admin6 = new \App\User;
        $admin6->email = "abiyanputrakisnomo@gmail.com";
        $admin6->nama = "Abiyana";
        $admin6->password = \Hash::make("ksk5thjaya");
        $admin6->save();

        $admin7 = new \App\User;
        $admin7->email = "titazap08@gmail.com";
        $admin7->nama = "Tita";
        $admin7->password = \Hash::make("ksk5thjaya");
        $admin7->save();

        $admin8 = new \App\User;
        $admin8->email = "rindabellifia@gmail.com";
        $admin8->nama = "Rinda";
        $admin8->password = \Hash::make("ksk5thjaya");
        $admin8->save();

        $admin9 = new \App\User;
        $admin9->email = "kamila.azhaaria@gmail.com";
        $admin9->nama = "Kamila";
        $admin9->password = \Hash::make("ksk5thjaya");
        $admin9->save();

        $admin10 = new \App\User;
        $admin10->email = "Syifaalthafiany@gmail.com";
        $admin10->nama = "Syifa";
        $admin10->password = \Hash::make("ksk5thjaya");
        $admin10->no_ujian = "5190120001";

        $admin10->save();

        $this->command->info("User Admin berhasil diinsert");

    }
}
