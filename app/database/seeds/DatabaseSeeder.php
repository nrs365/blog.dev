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

        for($i = 1; $i <= 2; $i++) 
        {
	        $user = new User();
	        $user->email = $i . '@codeup.com';
	        $user->password = Hash::make('adminPass123!');
	        $user->first_name = "first" . $i;
	        $user->last_name = "last" . $i;
	        $user->is_admin = $i % 2;
	        $user->save();
    	}
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

