<?php

use Illuminate\Database\Seeder;
use App\Story;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Story::create(['title' => 'Hidden message reveals clues to century-old P.E.I. farmhouse',
            'post' => 'A Prince Edward Island family recently received a message from beyond the grave, written by the original owner of their century-old farmhouse.',
            'user_id' => '1']);

        Story::create(['title' => 'Chicago Police Release Footage of Pinned Officer Shooting Teen Driver',
            'post' => 'Chicago Police released footage on November 9 of the fatal police shooting of 19-year-old Juan Flores after he pinned an officer between his SUV and a squad car.',
            'user_id' => '1']);

        Story::create(['title' => 'Tester news',
            'post' => 'Tester 3.',
            'user_id' => '1']);

        Story::create(['title' => 'Testing another news',
            'post' => 'Tester 4.',
            'user_id' => '1']);

        Story::create(['title' => 'Still testing news',
            'post' => 'Tester 5.',
            'user_id' => '1']);

        Story::create(['title' => 'Okayyyyyyyy',
            'post' => 'Yeah still testing news.',
            'user_id' => '1']);

        Story::create(['title' => 'I am still testing the news',
            'post' => 'This is to test pagination, please be patient.',
            'user_id' => '1']);

        Story::create(['title' => 'Well... I am losing patience',
            'post' => 'I know...',
            'user_id' => '1']);

        Story::create(['title' => 'Almost done...',
            'post' => 'Ninth story.',
            'user_id' => '1']);

        Story::create(['title' => 'Done',
            'post' => 'BOOM!.',
            'user_id' => '1']);

    }
}
