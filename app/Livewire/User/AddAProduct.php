<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\AddProduct;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class AddAProduct extends Component
{
    use WithFileUploads;

    public $productName;
    public $photos = [];
    public $productQuantity;
    public $productDescription;
    public $price;
    public $ecommercePlatform;

    protected $rules = [
        'productName' => 'required|min:3',
        'photos' => 'required|array|min:1',
        'photos.*' => 'image|max:10240', // 10MB max per file
        'productQuantity' => 'required|numeric|min:1',
        'productDescription' => 'required|min:10',
        'price' => 'required|numeric|min:0',
        'ecommercePlatform' => 'required|in:Amazon,Shopify,Noon,Other',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();

        try {
            // Store the photos
            $storedPhotos = [];
            foreach ($this->photos as $photo) {
                $path = $photo->store('addproduct', 'public');
                $storedPhotos[] = $path;
            }
            
            // Create the product with the stored photo paths
            $product = AddProduct::create([
                'user_id' => Auth::id(),
                'productName' => $this->productName,
                'photos' => json_encode($storedPhotos),
                'productQuantity' => $this->productQuantity,
                'productDescription' => $this->productDescription,
                'price' => $this->price,
                'ecommercePlatform' => $this->ecommercePlatform,
                'status' => 1, // Default status for new products
                'soldInStock' => 1, // Default stock status "1 = Instock", "0 = Sold"
            ]);

            // Clear the form
            session()->flash('success', 'Product Added Successfully');

            $this->reset();

            return redirect('/users/add-product')->with('wire:navigate', true);

        } catch (\Exception $e) {
            session()->flash('error', 'Error adding product: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.user.add-a-product');
    }
}
