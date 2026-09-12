<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class EditUserWithdrawalCodes extends Component
{
    public $user_data;

    public $edit_tax_code;
    public $edit_imf_code;
    public $edit_cot_code;

    public function mount($user_data)
    {
        $this->user_data = $user_data;
        $this->edit_tax_code = $user_data->tax_code;
        $this->edit_imf_code = $user_data->imf_code;
        $this->edit_cot_code = $user_data->cot_code;
    }

    public function editTaxCode()
    {
        $this->validate([
            "edit_tax_code" => 'required',
        ]);
        
        $user_id = $this->user_data->id;
        $result = User::where("id",$user_id)->update([
            "tax_code" => $this->edit_tax_code,
        ]);

                
        if ($result) {
            session()->flash('success', 'Customer Tax Code Updated successfully');

            return redirect()->route('admin_editUser', [$user_id]);
        }

        session()->flash('error', 'An error occurred try again later');

        return redirect()->route('admin_editUser', [$user_id]);
    }

    public function editImfCode()
    {
        $this->validate([
            "edit_imf_code" => 'required',
        ]);
        
        $user_id = $this->user_data->id;
        $result = User::where("id",$user_id)->update([
            "imf_code" => $this->edit_imf_code,
        ]);

                
        if ($result) {
            session()->flash('success', 'Customer IMF Code Updated successfully');

            return redirect()->route('admin_editUser', [$user_id]);
        }

        session()->flash('error', 'An error occurred try again later');

        return redirect()->route('admin_editUser', [$user_id]);
    }

    public function editCotCode()
    {
        $this->validate([
            "edit_cot_code" => 'required',
        ]);
        
        $user_id = $this->user_data->id;
        $result = User::where("id",$user_id)->update([
            "imf_code" => $this->edit_cot_code,
        ]);

                
        if ($result) {
            session()->flash('success', 'Customer COT Code Updated successfully');

            return redirect()->route('admin_editUser', [$user_id]);
        }

        session()->flash('error', 'An error occurred try again later');

        return redirect()->route('admin_editUser', [$user_id]);
    }

    public function render()
    {
        return view('livewire.admin.edit-user-withdrawal-codes');
    }
}
