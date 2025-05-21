<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $name = ["games-exclusive-edit", "games-exclusive-view", "games-exclusive-create", "admin-view", "admin-create", "admin-edit", "admin-delete", "category-view", "category-create", "category-edit", "category-delete", "game-view", "game-create", "game-edit", "game-delete", "wallet-view", "wallet-create", "wallet-edit", "wallet-delete", "deposit-view", "deposit-create", "deposit-edit", "deposit-update", "deposit-delete", "withdrawal-view", "withdrawal-create", "withdrawal-edit", "withdrawal-update", "withdrawal-delete", "order-view", "order-create", "order-edit", "order-update", "order-delete", "admin-menu-view", "setting-view", "setting-create", "setting-edit", "setting-update", "setting-delete"];
        $guardName = ["web", "web", "web", "web", "api", "api", "api", "api", "api", "api", "api", "web", "web", "web", "web", "web", "web", "web", "api", "api", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web", "web"];
        $permissionId = ["1", "2", "3", "4", "12", "13", "14", "15", "16", "17", "18", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40"];
        $roleId = ["1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1"];
        DB::table('settings')->insert([
            "software_name" => "SLOTGEN",
            "software_description" => "SLOTGEN plataforma de Casino",
            "language" => "en",
            "software_logo_white" => 0,
            "software_logo_black" => 0,
            "currency_code" => "BR",
            "decimal_format" => 'dot',
            "currency_position" => 'left',
            "revshare_percentage" => 50,
            "ngr_percent" => 0,
            "soccer_percentage" => 3,
            "prefix" => 'R$',
            "storage" => "local",
            "initial_bonus" => 100,
            "min_deposit" => '2.00',
            "max_deposit" => '50000.00',
            "min_withdrawal" => '10.00',
            "max_withdrawal" => '50000.00',
            "created_at" => '2023-09-24 17:40:05',
            "updated_at" => '2024-01-30 23:04:02',
            "instagram" => 0,
            "discord" => 0,
            "telegram" => 0,
            "twitter" => 0,
            "tiktok" => 0,
            "whatsapp" => 0,
            "active_gateway" => 'bspay',
        ]);

        DB::table('users')->insert([
            "role_id" => 0,
            "name" => "Admin",
            "is_admin" => 1,
            "last_name" => null,
            "cpf" => "12265696765",
            "phone" => 0,
            "email" => 'admin@slotgen.com',
            "email_verified_at" => null,
            "password" => '$2y$10$B4YOEgD82O2JnzvIH3/vvuRrCV1rp3Eziqt2Cbj/mm3HjLcjIAuXS',
            "remember_token" => 'E0FKgXT0ke5JnOYTGkD3QCoHgQHUItaljjwfJoeqsG9yjmPkxkawNrOwANd4',
            "token_time" => 1706675091,
            "token" => '69b7d9839ffcd751167921d7f9a5e819b6a9ce3acbc8f0e968241d739e95e280',
            "logged_in" => 0,
            "banned" => 0,
            "inviter" => 10,
            "affiliate_revenue_share" => '40.00',
            "affiliate_cpa" => '20.00',
            "affiliate_baseline" => '00.00',
            "is_demo_agent" => 1,
            "oauth_id" => 0,
            "oauth_type" => 0,
            "status" => 'active',
            "created_at" => '2023-09-24 18:13:49',
            "updated_at" => '2023-09-24 18:13:49',
            "kscinus" => 1,
        ]);

        DB::table('wallets')->insert([
            "user_id" => 1,
            "balance" => '43400.70',
            "balance_bonus" => '0.00',
            "balance_bonus_rollover" => '0.00',
            "anti_bot" => '0.00',
            "total_bet" => '0.00',
            "total_won" => '0.00',
            "total_lose" => '0.00',
            "last_won" => '0.00',
            "last_lose" => '0.00',
            "hide_balance" => 0,
            "refer_rewards" => '0.00',
            "created_at" => '2023-09-24 17:31:42',
            "updated_at" => '2024-02-09 19:13:11',
        ]);

        DB::table('roles')->insert([
            "name" => 'admin',
            "guard_name" => 'api',
            "created_at" => '2023-09-24 17:31:42',
            "updated_at" => '2024-02-09 19:13:11',
        ]);

        $games = [
            [
                "id" => 1,
                "name" => 'Gates Of Olympus',
                "uuid" => 'gatesofolympus',
                "image" => '01J4R1GWRWGGEH05FJVB4586FW.png',
                "type" => "GatesOfOlympus",
                "provider" => "SlotGen",
                "provider_service" => "\Slotgen\Slotgen",
                "technology" => 'gates_of_olympus',
                "category_id" => 1,
                "has_lobby" => 0,
                "is_mobile" => 0,
                "has_freespins" => 0,
                "has_tables" => 0,
                "slug" => 'slotgen-gates_of_olympus',
                "active" => 1,
                "views" => 0,
                "created_at" => '2023-09-24 17:31:42',
                "updated_at" => '2024-02-09 19:13:11',
            ],
            [
                "id" => 2,
                "name" => 'Fortune Dragon',
                "uuid" => 'fortunedragon',
                "image" => '01J4NPSSNPDANJAFFK4JXA77KQ.png',
                "type" => 'FortuneDragon',
                "provider" => 'SlotGen',
                "provider_service" => '\Slotgen\Slotgen',
                "technology" => 'fortune_dragon',
                "category_id" => 1,
                "has_lobby" => 0,
                "is_mobile" => 0,
                "has_freespins" => 0,
                "has_tables" => 0,
                "slug" => 'slotgen-fortune_dragon',
                "active" => 1,
                "views" => 0,
                "created_at" => '2023-09-24 17:31:42',
                "updated_at" => '2024-02-09 19:13:11',
            ],
            [
                "id" => 3,
                "name" => 'Captains Bounty',
                "uuid" => 'captainsbounty',
                "image" => '01J4R07421J2PK683J87BNJHWV.png',
                "type" => 'CaptainsBounty',
                "provider" => 'SlotGen',
                "provider_service" => '\Slotgen\Slotgen',
                "technology" => 'captains_bounty',
                "category_id" => 1,
                "has_lobby" => 0,
                "is_mobile" => 0,
                "has_freespins" => 0,
                "has_tables" => 0,
                "slug" => 'slotgen-captains_bounty',
                "active" => 1,
                "views" => 0,
                "created_at" => '2023-09-24 17:31:42',
                "updated_at" => '2024-02-09 19:13:11',
            ],
            [
                "id" => 4,
                "name" => 'Aztec',
                "uuid" => 'aztec',
                "image" => '01J4NQDRCQMX22KFJG5M7AKH29.png',
                "type" => 'Aztec',
                "provider" => 'SlotGen',
                "provider_service" => '\Slotgen\Slotgen',
                "technology" => 'aztec',
                "category_id" => 1,
                "has_lobby" => 0,
                "is_mobile" => 0,
                "has_freespins" => 0,
                "has_tables" => 0,
                "slug" => 'slotgen-aztec',
                "active" => 1,
                "views" => 0,
                "created_at" => '2023-09-24 17:31:42',
                "updated_at" => '2024-02-09 19:13:11',
            ],
            [
                "id" => 5,
                "name" => 'Space Man',
                "uuid" => 'spaceman',
                "image" => 'spaceman-logo.png',
                "type" => 'SpaceMan',
                "provider" => 'SlotGen',
                "provider_service" => '\Slotgen\Slotgen',
                "technology" => 'space_man',
                "category_id" => 1,
                "has_lobby" => 0,
                "is_mobile" => 0,
                "has_freespins" => 0,
                "has_tables" => 0,
                "slug" => 'slotgen-space_man',
                "active" => 1,
                "views" => 0,
                "created_at" => '2023-09-24 17:31:42',
                "updated_at" => '2024-02-09 19:13:11',
            ],
        ];
        
        foreach ($games as $game) {
            DB::table('games')->insert([$game]);
        }
        $banners = [
            [
                "id" => 1,
                "image" => '01J3C26XGMMV23BEA8FJHVHGM5.png',
                "type" => 'carousel',
                "description" => 'banner-1',
                "link" => 'assets\images\banner-1.png',
                "created_at" => '2024-07-21 22:52:01',
                "updated_at" => '2024-07-21 22:52:01',
            ],
            [
                "id" => 2,
                "image" => '01J3C2B3M9BN009157A90HP5Z3.png',
                "type" => 'carousel',
                "description" => 'banner-2',
                "link" => 'assets\images\banner-2.png',
                "created_at" => '2024-07-21 22:54:18',
                "updated_at" => '2024-07-21 22:54:18',
            ],
            [
                "id" => 3,
                "image" => '01J3C2C9939PQJT25E9ZV463G1.png',
                "type" => 'carousel',
                "description" => 'banner-3',
                "link" => 'assets\images\banner-3.png',
                "created_at" => '2024-07-21 22:54:56',
                "updated_at" => '2024-07-21 22:54:56',
            ],
            [
                "id" => 4,
                "image" => '01J3C36WN8QX2AF66PQDCHQFPK.png',
                "type" => 'carouselmini',
                "description" => 'banner-4',
                "link" => 'assets\images\banner-4.png',
                "created_at" => '2024-07-21 23:09:28',
                "updated_at" => '2024-07-21 23:09:28',
            ],
            [
                "id" => 5,
                "image" => '01J3C3840T6B3QQJA60E881ZSV.png',
                "type" => 'carouselmini',
                "description" => 'banner-5',
                "link" => 'assets\images\banner-5.png',
                "created_at" => '2024-07-21 23:10:09',
                "updated_at" => '2024-07-21 23:10:09',
            ],
            [
                "id" => 6,
                "image" => '01J3C3A2DEBBF248PY6A2Y6PGZ.png',
                "type" => 'carouselmini',
                "description" => 'banner-6',
                "link" => 'assets\images\banner-6.png',
                "created_at" => '2024-07-21 23:11:12',
                "updated_at" => '2024-07-21 23:11:12',
            ]
        ];
        $bank_groups = [
            [
                'name' => 'default',
                'status' => 'on',
                'minimum_deposit' => 0,
                'maximum_deposit' => 0
            ],
            [
                'name' => 'vip-1',
                'status' => 'on',
                'minimum_deposit' => 0,
                'maximum_deposit' => 0,
            ]
        ];
        $categories = [[
            "name" => 'Slotgen',
            "name_content" => 'Slotgen',
            "description" => null,
            "image" => null,
            "slug" => null,
        ]];
        foreach ($categories as $category) {
            DB::table('categories')->insert([$category]);
        }
        foreach ($banners as $banner) {
            DB::table('banners')->insert([$banner]);
        }
        DB::table('agents')->insert([
            "api" => 'https://airhoki.slotgen.com/api/seamless',
            "token" => 'aaaa',
            "operator_id" => 'botiqjk123',
            "currency" => "IDR",
        ]);
        DB::table('model_has_roles')->insert([
            "role_id" => 1,
            "model_type" => 'App\\Models\\User',
            "model_id" => 1,
        ]);

        for ($i = 0; $i < count($name); $i++) {
            DB::table('permissions')->insert([
                "name" => $name[$i],
                "guard_name" => $guardName[$i],
                "created_at" => '2023-09-24 17:31:42',
                "updated_at" => '2024-02-09 19:13:11',
            ]);
        }

        for ($i = 0; $i < count($permissionId); $i++) {
            DB::table('role_has_permissions')->insert([
                "permission_id" => $permissionId[$i],
                "role_id" => $roleId[$i],
            ]);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
