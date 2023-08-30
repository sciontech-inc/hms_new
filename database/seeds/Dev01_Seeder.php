<?php

use App\App;
use App\AppType;
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
        $app_type_data = array([

            //id = 4
            'name' => 'HRIS',
            'code' => 'hris',
            'status' => '1',
            'sort_no' => '0',
            'created_by' => '1',
            'updated_by' => '1',

        ],
    
    );

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
            'name' => 'SUPPLIES INVENTORY',
            'code' => 'supplies_inventory_maintenance',
            'sort_no' => '3',
            'app_type_id' => '1',
            'status' => '1',
            'module' => '1',
            'icon' => 'dolly-flatbed',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 11
            'name' => '201 File',
            'code' => '201_file',
            'sort_no' => '0',
            'app_type_id' => '4',
            'status' => '1',
            'module' => '0',
            'icon' => 'folder-open',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 12
            'name' => 'PATIENT MANAGEMENT',
            'code' => 'patient_management_maintenance',
            'sort_no' => '0',
            'app_type_id' => '1',
            'status' => '1',
            'module' => '1',
            'icon' => 'user-plus',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 13
            'name' => 'CONSULTANT INFORMATION',
            'code' => 'consultant_information_maintenance',
            'sort_no' => '0',
            'app_type_id' => '1',
            'status' => '1',
            'module' => '0',
            'icon' => 'headset',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 14
            'name' => 'HMOS / GUARANTORS',
            'code' => 'hmo_guarantor',
            'sort_no' => '0',
            'app_type_id' => '1',
            'status' => '1',
            'module' => '0',
            'icon' => 'user-lock',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 15
            'name' => 'TIMEKEEPING',
            'code' => 'timekeeping',
            'sort_no' => '0',
            'app_type_id' => '2',
            'status' => '1',
            'module' => '0',
            'icon' => 'clock',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [
            //id = 15
            'name' => 'PHILHEALTH',
            'code' => 'philhealth',
            'sort_no' => '0',
            'app_type_id' => '2',
            'status' => '1',
            'module' => '1',
            'icon' => 'laptop-medical',
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

            'name' => 'PATIENT ADMISSION',
            'code' => 'patient_admission',
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

            'name' => 'SUPPLIER',
            'code' => 'supplier',
            'app_id' => '10',
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'MANUFACTURER',
            'code' => 'manufacturer',
            'app_id' => '10',
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'TIME LOGS',
            'code' => 'time_logs',
            'app_id' => '15',
            'sort_no' => '0',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'SCHEDULING',
            'code' => 'scheduling',
            'app_id' => '15',
            'sort_no' => '0',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'PATIENT APPOINTMENT',
            'code' => 'patient_appointment',
            'app_id' => '4',
            'sort_no' => '2',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'CHECK UP',
            'code' => 'check_up',
            'app_id' => '4',
            'sort_no' => '3',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'CLAIMS ELIGIBILITY',
            'code' => 'claims_eligibility',
            'app_id' => '16',
            'sort_no' => '0',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'UTILITY',
            'code' => 'philhealth_utility',
            'app_id' => '16',
            'sort_no' => '0',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        
       
    );
      
        foreach($app_type_data as $app_type) {
                
            AppType::firstOrCreate($app_type);
        }


        foreach($app_data as $app) {

            App::firstOrCreate($app);
        }

        foreach($app_module_data as $app_module) {
            
            AppModule::firstOrCreate($app_module);
        }

    }
}
