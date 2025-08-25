<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CreateUserCommand extends Command
{
    protected $signature = 'users:create';

    protected $description = 'Creates a new user';

    public function handle()
    {
        // Ask for a name, email, password
        $user['name'] = $this->ask('Name of the new user:');
        $user['email'] = $this->ask('Email of the new user:');
        $user['password'] = $this->secret('Password of the new user:');

        // 1 => user (default)
        // 2 => admin
        $roleName = $this->choice('Role of the new user', ['user', 'admin'], 0);

        // Check the role exists in the db
        $role = Role::where('name', $roleName)->first();
        if (! $role){
            $this->error('Role not found');

            return -1;
        }

        // Validate data
        $validator = Validator::make($user, [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email', 'min:2', 'max:255'],
            'password' => ['required', Password::defaults()],
        ]);

        // Show error messages
        if ($validator->fails()){
            foreach ($validator->errors()->all() as $error){
                $this->error($error);
            }

            return -1;
        }


        DB::transaction(function () use ($user, $role){
            $user['password'] = Hash::make($user['password']);
            $newUser = User::create($user);
            $newUser->role_id = $role->id;
        });

        $this->info('User '.$user['email'].' created successfully');

        return 0;
    }
}
