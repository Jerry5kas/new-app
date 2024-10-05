<?php

namespace App\Livewire\MemberCrud;

use Livewire\Component;
use App\Models\Member;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name, $uid, $memberId;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'uid' => 'nullable|exists:members,id',
    ];

    public function render()
    {
        return view('livewire.member-crud.index', [
            'members' => Member::paginate(10),
            'uids' => Member::all(), // Get all members for dropdown
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEdit = false;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $this->memberId = $id;
        $this->name = $member->name;
        $this->uid = $member->uid;
        $this->isEdit = true;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function save()
    {
        $this->validate();

        if ($this->isEdit) {
            Member::find($this->memberId)->update([
                'name' => $this->name,
                'uid' => $this->uid,
            ]);
        } else {
            Member::create([
                'name' => $this->name,
                'uid' => $this->uid,
            ]);
        }

        session()->flash('message', 
            $this->isEdit ? 'Member updated successfully.' : 'Member created successfully.');

        $this->resetInputFields();
        $this->dispatchBrowserEvent('hide-modal');
    }

    public function delete($id)
    {
        Member::find($id)->delete();
        session()->flash('message', 'Member deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->uid = null;
        $this->memberId = null;
        $this->isEdit = false;
    }
}
