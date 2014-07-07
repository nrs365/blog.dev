<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('PostTableSeeder');
	}
}	

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = 'admin@codeup.com';
        $user->password = Hash::make('adminPass123!');
        $user->save();
   	}    
}

class PostTableSeeder extends Seeder {

	public function run()
	{
		DB::table('posts')->delete();

		$user = User::first();

		for ($i = 1; $i <= 10; $i++)
		{
			$post = new Post();
			$post->user_id =$user->id;
			$post->title = "Post Title $i";
			$post->body = "Post Body $i";
			$post->save();
		}	
	}
}

