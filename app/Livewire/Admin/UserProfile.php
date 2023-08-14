<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserProfile extends Component
{
    use WithFileUploads;
    
    public User $users;
    
    #[Rule('nullable|mimes:png,jpg|max:1024')]
    public $avatar;
    
    public function render()
    {
        return view('livewire.admin.user-profile');
    }
    
    protected function rules()
    {
        return [
            'users.name' => 'required|max:40|min:3',
            'users.email'=> 'required|email|unique:users,email,'.$this->users->id.',id',
            'users.phone' => 'max:10',
            'users.about' => 'max:200',
            'users.location' => 'min:3',
        ];
    }

    public function mount() {
        $this->users = auth()->user();
    }

    public function save() {
            
        if(env('IS_DEMO')) {
           // Set Flash Message
            $this->dispatch('post-created', type: 'success',message: 'Your profile information have been successfuly saved!');
        } else {
            
            $this->validate();
            if($this->avatar)
            {
                $this->users->avatar = $this->avatar->store('avatars','public');
                if(auth()->user()->avatar)
                {
                    Storage::disk('public')->delete(auth()->user()->avatar);
                }
            }
            $this->users->save();
            
            // Set Flash Message
            $this->dispatch('post-created', type: 'success',message: 'Your profile information have been successfuly saved!');
        }
    }
}
