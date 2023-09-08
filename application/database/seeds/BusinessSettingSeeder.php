<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_settings')->insert([
            ['id' => 1, 'type' => 'system_default_currency', 'value' => 1],
            ['id' => 2, 'type' => 'company_name', 'value' => 'Cg Digital'],
            ['id' => 3, 'type' => 'company_web_logo', 'value' => '2023-01-12-63bf8dccd8931.png'],
            ['id' => 4, 'type' => 'company_mobile_logo', 'value' => '2021-02-20-6030c88c91911.png'],
            ['id' => 5, 'type' => 'company_email', 'value' => 'admin@parallaxlogic.com'],
            ['id' => 6, 'type' => 'colors', 'value' => '{"primary":"#77b847","secondary":"#161d25"}'],
            ['id' => 7, 'type' => 'company_footer_logo', 'value' => '2023-01-12-63bf8dccdbf0f.png'],
            ['id' => 8, 'type' => 'company_copyright_text', 'value' => 'CopyRight parallaxlogic@2021'],
            ['id' => 9, 'type' => 'company_fav_icon', 'value' => '2023-01-12-63bf8d9485901.png'],
            ['id' => 10, 'type' => 'about_us', 'value' => '<p>this is about us page. hello and hi from about page description..</p>'],
            ['id' => 11, 'type' => 'product_brand', 'value' => 1],
            ['id' => 12, 'type' => 'company_phone', 'value' => '+8801234567891'],
            ['id' => 13, 'type' => 'digital_product', 'value' => '1'],
            ['id' => 14, 'type' => 'download_app_apple_stroe', 'value' => '{"status":"1","link":"https:\\/\\/parallaxlogic.com\\/"}'],
            ['id' => 15, 'type' => 'download_app_google_stroe', 'value' => '{"status":"1","link":"https:\\/\\/parallaxlogic.com\\/"}'],
            ['id' => 16, 'type' => 'language', 'value' => '[{"id":"1","name":"english","code":"en","status":1}]'],
            ['id' => 17, 'type' => 'esewa', 'value' => '{"status":"1","environment":"sandbox","esewa_client_id":"","esewa_secret":""}'],
            ['id' => 18, 'type' => 'khalti', 'value' => '{"status":"1","environment":"sandbox","khalti_client_id":"","khalti_secret":""}'],
            ['id' => 19, 'type' => 'pnc_language', 'value' => '["en"]'],
            ['id' => 20, 'type' => 'product_brand', 'value' => '1'],
        ]);
    }
}
