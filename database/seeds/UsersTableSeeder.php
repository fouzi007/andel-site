<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $admin = \App\Role::create( [
            'name'        => 'admin',
            'description' => 'Administrateur Système'
        ] );
        \App\Role::create( [
            'name'        => 'medecin',
            'description' => 'Médecin'
        ] );
        \App\Role::create( [
            'name'        => 'manager',
            'description' => 'Manager'
        ] );
        \App\Role::create( [
            'name'        => 'labo',
            'description' => 'Laboratoire'
        ] );
        \App\Role::create( [
            'name'        => 'agence',
            'description' => 'Agence'
        ] );
        \App\Role::create( [
            'name'        => 'hotesse',
            'description' => 'Hôtesse'
        ] );
        User::create( [
            'nom'               => 'Noual',
            'prenom'            => 'Fawzi',
            'wilaya_id'         => 16,
            'email'             => 'fouzi.noual@gmail.com',
            'date_naissance'    => \Carbon\Carbon::parse( '1991-08-28' ),
            'email_verified_at' => now(),
            'telephone'         => '0540781136',
            'password'          => bcrypt( 'fnoual123' ),
            'role_id'           => $admin->id,
            'is_active'         => true
        ] );

        User::create( [
            'nom'               => 'Brika',
            'prenom'            => 'Fatah',
            'wilaya_id'         => 19,
            'email'             => 'brika_fatah@yahoo.com',
            'date_naissance'    => \Carbon\Carbon::parse( '1980-01-01' ),
            'email_verified_at' => now(),
            'telephone'         => '0661568674',
            'password'          => bcrypt('12345678'),
            'statut'            => 'Libéral',
            'adresse'           => 'Cité 250 Logements El Eulma Setif',
            'specialite'        => 'Endocrinologue',
            'role_id'           => $admin->id,
            'is_active'         => true
        ] );

        User::create([
            'nom' => 'Hôtesse',
            'prenom' => ' 1',
            'wilaya_id' => 31,
            'email' => 'hotesse.1@andel-dz.com',
            'email_verified_at' => now(),
            'password' => bcrypt('hotesse'),
            'role_id' => 6,
            'is_active' => true
        ]);
    }
}
