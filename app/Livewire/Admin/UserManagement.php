<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class UserManagement extends Component
{
    use WithPagination;

    protected $queryString = ['search' => ['except'=>'']];
    public $search = '';
    public $orderBy = 'id';
    public $sortBy = 'desc';
    
    public $is_create_page = false;
    public $is_list_page = true;
    
    protected $paginationTheme = 'bootstrap';
    
    public function sortby($field) {
        $this->orderBy = $field;
        
        if($this->orderBy == $field)
        {
            $this->sortBy = $this->sortBy === 'desc' ? 'asc' : 'desc';
        }
        else
        {
            $this->sortBy = 'desc';
        }
    }

    public function alertConfirm($userId)
    {
        $this->dispatch('swal:confirm', type: 'warning',message: 'Are you sure?',text:'If deleted, you will not be able to recover this imaginary file!',userId:$userId);
    }
    
    public function deleteUser($userId) 
    {
        $user = User::findOrFail($userId);
        $user->delete();
        // Set Flash Message
        $this->dispatch('post-created', type: 'success',message: 'The record was successfully removed.');
    }

    
    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%')->orderBy($this->orderBy,$this->sortBy)->paginate(10);
        
        if(session('notify')) {
            if(session('notify') == 'save')
            {
                // Set Flash Message
            $this->dispatch('post-created', type: 'success',message: 'User information have been successfuly saved!');
            }
            elseif(session('notify') == 'edit')
            {
                // Set Flash Message
            $this->dispatch('post-created', type: 'success',message: 'User information have been successfuly updated!');
            }
            session()->flash('notify', '');
        }
        
        return view('livewire.admin.user-management',['users'=>$users]);
    }
}
