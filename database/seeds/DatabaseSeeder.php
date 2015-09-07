<?php

use App\Adminuser;
use App\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            Model::unguard();
            $this->call('SitesettingTableSeeder');
            $this->call('AdminusersTableSeeder');
            $this->call('ProvidersTableSeeder');
			
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
            Model::reguard();
		
	}

}

class SitesettingTableSeeder extends Seeder {

    public function run()
    {
        DB::table('sitesettings')->delete();
        
        $data = array(
		array('sitesettings_name'=>'webmaster_email', 'sitesettings_type' => 'TEXT', 'sitesettings_data_type' => 'TEXT', 'sitesettings_lebel' => 'Webmaster Email', 'sitesettings_value' => 'support@physiotrax.com', 'status' => 'Active', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')),
		
		array('sitesettings_name'=>'info_email', 'sitesettings_type' => 'TEXT', 'sitesettings_data_type' => 'TEXT', 'sitesettings_lebel' => 'Info Email', 'sitesettings_value' => 'info@physiotrax.com', 'status' => 'Active', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')),
		
		array('sitesettings_name'=>'phone_no', 'sitesettings_type' => 'TEXT', 'sitesettings_data_type' => 'TEXT', 'sitesettings_lebel' => 'Phone Number', 'sitesettings_value' => '989898989809', 'status' => 'Active', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')),
		
		array('sitesettings_name'=>'address', 'sitesettings_type' => 'TEXT', 'sitesettings_data_type' => 'TEXT', 'sitesettings_lebel' => 'Address', 'sitesettings_value' => 'demo address', 'status' => 'Active', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')),
		
		array('sitesettings_name'=>'pinterest', 'sitesettings_type' => 'TEXT', 'sitesettings_data_type' => 'TEXT', 'sitesettings_lebel' => 'Pinterest', 'sitesettings_value' => 'https://www.pinterest.com/', 'status' => 'Active', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')),
		
		array( 'sitesettings_name'=>'facebook', 'sitesettings_type' => 'TEXT', 'sitesettings_data_type' => 'TEXT', 'sitesettings_lebel' => 'Facebook', 'sitesettings_value' => 'https://www.facebook.com/', 'status' => 'Active', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')),
		array( 'sitesettings_name'=>'twitter', 'sitesettings_type' => 'TEXT', 'sitesettings_data_type' => 'TEXT', 'sitesettings_lebel' => 'Twitter', 'sitesettings_value' => 'https://twitter.com/', 'status' => 'Active', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')),
		
	);
	
	DB::table('sitesettings')->insert($data);
	
	

    }

}

class AdminusersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('adminusers')->delete();
        
        Adminuser::create(['name' => 'Subhra Bhattacharya', 'image' => '', 'phone' => '', 'email' => 'admin@physiotrax.com', 'password' => '123456', 'status' => 'Active', 'created_at' => date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]);
        
    }

}

class ProvidersTableSeeder extends Seeder {
    public function run()
    {
        DB::table('providers')->delete();        
        Provider::create(['password' => '123456', 'phone' => '964587522', 'email' => 'provider.demo@physiotrax.com', 'business_name' => 'Provider Demo','address'=> 'demo address','city' => 'demo city','zip' => '722220', 'contact_name' => 'Almamun', 'state_id' => 1, 'status' => 'Active', 'created_at' => date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]);
    }
}

