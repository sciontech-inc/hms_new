<?php

use App\App;
use App\Access;
use App\AppModule;

use Illuminate\Database\Seeder;

class Dev01_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $app_data = array([

            //id = 4
            'name' => 'PATIENT MANAGEMENT',
            'code' => 'patient_management',
            'sort_no' => '1',
            'app_type_id' => '2',
            'status' => '1',
            'module' => '1',
            'icon' => 'hospital-user',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 5
            'name' => 'NURSE STATION',
            'code' => 'nurse_station',
            'sort_no' => '2',
            'app_type_id' => '2',
            'status' => '1',
            'module' => '1',
            'icon' => 'user-nurse',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 6
            'name' => 'FACILITY',
            'code' => 'facility',
            'sort_no' => '3',
            'app_type_id' => '1',
            'status' => '1',
            'module' => '0',
            'icon' => 'hospital',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 7
            'name' => 'PHARMACY MANAGEMENT',
            'code' => 'pharmacy_management',
            'sort_no' => '4',
            'app_type_id' => '2',
            'status' => '1',
            'module' => '1',
            'icon' => 'file-prescription',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 8
            'name' => 'SUPPLIES MANAGEMENT',
            'code' => 'supplies_management',
            'sort_no' => '5',
            'app_type_id' => '2',
            'status' => '1',
            'module' => '1',
            'icon' => 'boxes',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 9
            'name' => 'STAFF MANAGEMENT',
            'code' => 'staff_management',
            'sort_no' => '6',
            'app_type_id' => '2',
            'status' => '1',
            'module' => '1',
            'icon' => 'id-card-alt',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 10
            'name' => 'STAFF MANAGEMENT',
            'code' => 'staff_management_maintenance',
            'sort_no' => '2',
            'app_type_id' => '1',
            'status' => '1',
            'module' => '1',
            'icon' => 'users-cog',
            'created_by' => '1',
            'updated_by' => '1',

        ]
    
    );
        
        $app_module_data = array([

            'name' => 'PATIENT',
            'code' => 'patient',
            'app_id' => '4',
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'RECEPTION',
            'code' => 'reception',
            'app_id' => '4',
            'sort_no' => '2',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'ROOMS & BEDS',
            'code' => 'rooms_beds',
            'app_id' => '5',
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'PHARMACY INVENTORY',
            'code' => 'pharmacy_inventory',
            'app_id' => '7',
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'SUPPLIES INVENTORY',
            'code' => 'supplies_inventory',
            'app_id' => '8',
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'DOCTOR',
            'code' => 'doctor',
            'app_id' => '9',
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'DEPARTMENT',
            'code' => 'department',
            'app_id' => '10',
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
       
    );
      

        foreach($app_data as $app) {

            App::firstOrCreate($app);
        }

        foreach($app_module_data as $app_module) {
            
            AppModule::firstOrCreate($app_module);
        }
    }
}
