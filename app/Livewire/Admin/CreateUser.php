<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\UserManagement;
use Livewire\Attributes\Rule;
use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{
    public User $users;
    
    #[Rule('same:password')] 
    public $password_confirmation;
    
    public $password;
    
    public function render()
    {
        return view('livewire.admin.create-user');
    }
    
    public function mount(User $user)
    {
        if($user)
        {
            $this->users = $user;
            $this->fill(['password' => '']);
        }
        else
        {
            $this->users = new User();
        }
    }
    
    protected function rules()
    {
        if($this->users->toArray())
        {
            $is_rules = 'nullable|min:6';
        }
        else
        {
            $is_rules = 'required|min:6';
        }
        
        return [
            'users.name' => 'required|max:40|min:3',
            'users.email'=> 'required|email|unique:users,email,'.$this->users->id.',id',
            'users.phone' => 'max:10',
            'users.about' => 'max:200',
            'users.location' => 'nullable|min:3',
            'password' => $is_rules,
        ];
    }

    public function saveUser() {
        if(env('IS_DEMO')) {
           $this->showDemoNotification = true;
        } else {
            $validateData = $this->validate();
            $validateData['users']['password'] = bcrypt($validateData['password']);
            User::create($validateData['users']);
            $this->showSuccesNotification = true;
            // Set Flash Message
            session()->flash('notify', 'save');
            return $this->redirect('/user-management', navigate: true);
            
        }
    }
    
    public function editUser() {
        if(env('IS_DEMO')) {
           $this->showDemoNotification = true;
        } else {
            $validateData = $this->validate();
            if($validateData['password'])
            {
                $validateData['users']['password'] = bcrypt($validateData['password']);
            }
            $this->users->save();
            
            session()->flash('notify', 'edit');
            return $this->redirect('/user-management', navigate: true);
        }
    }
}
