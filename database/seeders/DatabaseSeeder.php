<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AgentType;
use App\Models\CompanyType;
use App\Models\CustomerType;
use App\Models\Prerequisite;
use App\Models\PriceListTarget;
use App\Models\QualificationCategory;
use App\Models\QualificationLevel;
use App\Models\SupplierType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $levels=[
            'Certificate I',
            'Certificate II',
            'Certificate III',
            'Certificate iv',
            'Diploma',
            'Advanced Diploma',
            'Graduate Certificate',
            'Graduate Diploma',
        ];
        $categories=[
            'Health And community',
            'Trade Industry',
            'Business and management',
            'Training And Assessment (TAE)',
            'Accounting and Finance',
            'Design and ART',
            'Information System',
            'First Aid',
            'Beauty and Hairdressing',
            'Hospitality',
            'Travel and Tourism',
            'Horticulture',
            'Fitness',
        ];
        $supplierTypes=[
            'Cricos - international Student',
            'RPL',
            'Trade',
            'Face to Face',
            'Smart and skilled',
            'Online'
        ];
        $agentTypes=[
            'Normal',
            'Bronze',
            'Silver',
            'Gold',
            'VIP',
        ];
        $customerTypes=[
            'Normal',
            'VIP'
        ];
        $pre=[
            'None',
            'Degree'
        ];
        $companytypes=[
            'RTO',
            'Pty LTD'
        ];
        $pricetTargets=[
            'Normal',
            'Bronze',
            'Silver',
            'Gold',
            'VIP',
        ];
        User::create(["name"=> "admin","email"=> "admin@course.com","password"=> bcrypt("12341234"), "role"=>'Admin']);

        foreach ($levels as $level) {
        QualificationLevel::create(["name"=> $level]);
         }
         foreach ($categories as $category) {
            QualificationCategory::create(["name"=> $category]);
         }
         foreach ($supplierTypes as $supplierType) {
            SupplierType::create(["name"=> $supplierType]);
         }
         foreach ($agentTypes as $agentType) {
            AgentType::create(['name'=>$agentType]);
         }
         foreach ($customerTypes as $customerType) {
            CustomerType::create(['name'=>$customerType]);
         }
         foreach ($pre as $prereq) {
            Prerequisite::create(['name'=>$prereq]);
         }
         foreach ($companytypes as $ct) {
            CompanyType::create(['name'=>$ct]);
         }
         foreach ($pricetTargets as $pricetTarget) {
            PriceListTarget::create(['name'=>$pricetTarget]);
         }

}
}
