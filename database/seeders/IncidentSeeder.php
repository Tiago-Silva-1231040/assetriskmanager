<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTimeImmutable;
use DateTimeZone;

class IncidentSeeder extends Seeder
{
    const TABLE = "incidents";

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table(self::TABLE)->insert([
            "name" => "Incident 1",
            "description" => "Description of incident 1",
            "start_timestamp" => (new DateTimeImmutable("2026-01-01 10:01:09", new DateTimeZone("UTC")))->format('Y-m-d H:i:s'),
            "end_timestamp" => (new DateTimeImmutable("2026-01-01 10:14:32", new DateTimeZone("UTC")))->format('Y-m-d H:i:s')
        ]);
    }
}