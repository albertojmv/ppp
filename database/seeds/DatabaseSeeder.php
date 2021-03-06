<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        $this->call('CountriesTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('StatesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('ProvincesTableSeeder');
        $this->call('CivilstatusTableSeeder');
        $this->call('GendersTableSeeder');
        $this->call('LoanstatusTableSeeder');
        $this->call('WarrantiesTableSeeder');
        $this->call('PaymentmethodsTableSeeder');
        $this->call('CalculationtypesTableSeeder');
        $this->call('QuotastatusTableSeeder');
        $this->call('FormofpaymentsTableSeeder');
        $this->call('References_typesTableSeeder');
        $this->call('TypeofcompaniesTableSeeder');
    }

}
