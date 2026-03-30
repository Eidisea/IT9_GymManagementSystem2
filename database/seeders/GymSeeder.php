<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\Membership;
use Carbon\Carbon;

class GymSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample members
        $member1 = Member::create([
            'fullname' => 'Juan Dela Cruz',
            'email' => 'juan.delacruz@example.com',
            'phone' => '09171234567',
            'address' => '123 Main Street, Manila',
            'age' => 25
        ]);

        $member2 = Member::create([
            'fullname' => 'Maria Santos',
            'email' => 'maria.santos@example.com',
            'phone' => '09187654321',
            'address' => '456 Rizal Avenue, Quezon City',
            'age' => 30
        ]);

        $member3 = Member::create([
            'fullname' => 'Pedro Reyes',
            'email' => 'pedro.reyes@example.com',
            'phone' => '09191112222',
            'address' => '789 Bonifacio Street, Makati',
            'age' => 28
        ]);

        // Create sample memberships
        Membership::create([
            'member_id' => $member1->id,
            'plan_type' => 'Monthly',
            'amount' => 1500.00,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonth(),
            'status' => 'active'
        ]);

        Membership::create([
            'member_id' => $member2->id,
            'plan_type' => 'Quarterly',
            'amount' => 4000.00,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonths(3),
            'status' => 'active'
        ]);

        Membership::create([
            'member_id' => $member3->id,
            'plan_type' => 'Annual',
            'amount' => 15000.00,
            'start_date' => Carbon::now()->subMonths(6),
            'end_date' => Carbon::now()->addMonths(6),
            'status' => 'active'
        ]);
    }
}
