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

            'name' => 'PATIENT MANAGEMENT',
            'code' => 'patient_management',
            'sort_no' => '1',
            'app_type_id' => '2',
            'status' => '1',
            'module' => '1',
            'icon' => 'hospital-user',
            'created_by' => '1',
            'updated_by' => '1',

        ]);
        
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
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'PATIENT EMERGENCY',
            'code' => 'patient_emergency',
            'app_id' => '4',
            'sort_no' => '1',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1',

        ],
        [

            'name' => 'PATIENT DISCHARGE',
            'code' => 'patient_discharge',
            'app_id' => '4',
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
