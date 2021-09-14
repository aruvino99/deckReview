<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        DB::table('threads')->insert([
            [
                'title' => 'テスト1',
                'detail' => 'test1説明',
                'user_id' => 1,
            ],
            [
                'title' => 'テスト2',
                'detail' => 'test2説明',
                'user_id' => 1,
            ],
            [
                'title' => 'テスト3',
                'detail' => 'test3説明',
                'user_id' => 1,
            ],
            [
                'title' => 'テスト4',
                'detail' => 'test4説明',
                'user_id' => 1,
            ],
            [
                'title' => 'テスト5',
                'detail' => 'test5説明',
                'user_id' => 1,
            ],
        ]);
    }
}
