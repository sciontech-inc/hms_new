<?php

use Auth;
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

        $app = App::firstOrCreate([ 
                'name' => 'PATIENT MANAGEMENT',
                'code' => 'patient_management',
                'sort_no' => '1',
                'app_type_id' => '2',
                'status' => '1',
                'module' => '1',
                'icon' => 'hospital-user',
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);

        $app_module = AppModule::firstOrCreate(
            [
                'name' => 'PATIENT',
                'code' => 'patient',
                'app_id' => '4',
                'sort_no' => '1',
                'status' => '1',
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);

        Access::firstOrCreate(
            [
                'role_id' => Auth::user()->access->role_id,
                'permission_for' => 'apps',
                'permission_for_id' => $app->id,
                'enable' => '1',
                'add' => '1',
                'edit' => '1',
                'delete' => '1',
                'print' => '1',
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ],

            [
                'role_id' => Auth::user()->access->role_id,
                'permission_for' => 'app_module',
                'permission_for_id' => $app_module->id,
                'enable' => '1',
                'add' => '1',
                'edit' => '1',
                'delete' => '1',
                'print' => '1',
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);
    }
}
