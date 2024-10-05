<?php

namespace App\Livewire\Web\Home;

use Aaran\Web\Models\DemoRequest;
use App\Livewire\Trait\CommonTraitNew;
use Livewire\Component;

class Contact extends Component
{
    use CommonTraitNew;

    public $email;
    public $phone;
    public $subject;
    public $message;

    public function mount()
    {
        $this->common->active_id = 1;
    }

    #region[Get-Save]
    public function getSave(): void
    {
        $this->validate([
                'common.vname' => 'required|min:3',
                'email' => 'required|email|unique:demo_requests,email',
                'phone' => 'required|numeric|digits:10|unique:demo_requests,phone',
            ]
        );
        if ($this->common->vname != '') {
            if ($this->common->vid == '') {
                $DemoRequest = new DemoRequest();
                $extraFields = [
                    'phone' => $this->phone,
                    'email' => $this->email,
                    'subject' => $this->subject,
                    'message' => $this->message,
                ];
                $this->common->save($DemoRequest, $extraFields);
                $message = "Saved";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        $this->clearFields();
    }
    #endregion

    #region[Get-Obj]
    public function getObj($id)
    {
        if ($id) {
            $DemoRequest = DemoRequest::find($id);
            $this->common->vid = $DemoRequest->id;
            $this->common->vname = $DemoRequest->vname;
            $this->phone = $DemoRequest->phone;
            $this->email = $DemoRequest->email;
            $this->subject = $DemoRequest->subject;
            $this->message = $DemoRequest->message;
            return $DemoRequest;
        }
        return null;
    }
    #endregion

    #region[Clear-Fields]
    public function clearFields(): void
    {
        $this->common->vid = '';
        $this->common->vname = '';
        $this->phone = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';
        $this->common->active_id = 1;
    }

    #endregion
    public function render()
    {
        return view('livewire.web.home.contact')->layout('layouts.web');
    }
}
