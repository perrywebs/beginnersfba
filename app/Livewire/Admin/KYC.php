<?php

namespace App\Livewire\Admin;

use App\Models\UserDocument;
use Livewire\Component;
use Livewire\WithPagination;

class KYC extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $selectedDocument = null;
    public $previewImage = null;
    public $previewTitle = '';

    // Approve KYC Document
    public function approve($id)
    {
        $doc = UserDocument::findOrFail($id);
        $doc->update(['status' => 'approved']);

        session()->flash('success', "KYC document for {$doc->user->name} approved successfully.");
    }

    // Decline KYC Document
    public function decline($id)
    {
        $doc = UserDocument::findOrFail($id);
        $doc->update(['status' => 'rejected']);

        session()->flash('error', "KYC document for {$doc->user->name} declined.");
    }

    // Open Modal Image Preview
    public function openPreview($imagePath, $title = 'Document Preview')
    {
        $this->previewImage = asset('storage/' . $imagePath);
        $this->previewTitle = $title;
        $this->dispatch('open-kyc-modal');
    }

    public function render()
    {
        $documents = UserDocument::with('user')
            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.k-y-c', [
            'documents' => $documents,
        ]);
    }
}