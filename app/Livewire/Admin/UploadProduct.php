<?php

namespace App\Livewire\Admin;

use App\Models\AddProduct;
use Livewire\Component;

class UploadProduct extends Component
{
    public $add_products;
    public $user;

    public $quantities = [];

    public function mount()
    {
        // Initialize quantities with the current product quantities
        $this->quantities = $this->add_products->pluck('productQuantity', 'id')->toArray();
    }

    public function editQuantity($productId)
    {
        // Validate the quantity input for the specific product
        $this->validate([
            'quantities.' . $productId => 'required|numeric|min:0',
        ]);

        // Update the product quantity in the database
        $product = AddProduct::find($productId);
        $product->productQuantity = $this->quantities[$productId];
        $product->save();
    }

    public function acceptStatus($id)
    {
        $productData = AddProduct::findOrFail($id);
        $user = $this->user;
        if ($productData->status == 2) {
            session()->flash('error', 'Product already accepted');
            return redirect()->route('admin_editUser', [$user->id]);
        }

        if ($productData) {
            AddProduct::where("id", "$id")->update([
                "status" => 2,
            ]);
            session()->flash('success', 'Product accepted');
            return redirect()->route('admin_editUser', [$user->id]);
        }
        session()->flash('error', 'An error occurred try again later');
        return redirect()->route('admin_editUser', [$user->id]);
    }

    public function denyStatus($id) {
        $productData = AddProduct::findOrFail($id);
        $user = $this->user;
        if ($productData->status == 3) {
            session()->flash('error', 'Product already denied');
            return redirect()->route('admin_editUser', [$user->id]);
        }

        if ($productData) {
            AddProduct::where("id", "$id")->update([
                "status" => 3,
            ]);
            session()->flash('success', 'Product denied');
            return redirect()->route('admin_editUser', [$user->id]);
        }
        session()->flash('error', 'An error occurred try again later');
        return redirect()->route('admin_editUser', [$user->id]);
    }

    public function inStock($id)
    {
        $productData = AddProduct::where("id", "$id")->get()->first();
        $user = $this->user;

        if ($productData->soldInStock == 1) {
            session()->flash('error', 'Product declared inStock already');

            return redirect()->route('admin_editUser', [$user->id]);
        }

        if ($productData) {
            AddProduct::where("id", "$id")->update([
                "soldInStock" => 1,
            ]);
            session()->flash('success', 'Product declared inStock');

            return redirect()->route('admin_editUser', [$user->id]);
        }
        session()->flash('error', 'An error occurred try again later');

        return redirect()->route('admin_editUser', [$user->id]);
    }

    public function soldOut($id)
    {
        $productData = AddProduct::where("id", "$id")->get()->first();
        $user = $this->user;

        if ($productData->soldInStock == 2) {
            session()->flash('error', 'Product declared sold out already');

            return redirect()->route('admin_editUser', [$user->id]);
        }

        if ($productData) {
            AddProduct::where("id", "$id")->update([
                "soldInStock" => 2,
            ]);
            session()->flash('success', 'Product declared Sold Out');

            return redirect()->route('admin_editUser', [$user->id]);
        }
        session()->flash('error', 'An error occurred try again later');

        return redirect()->route('admin_editUser', [$user->id]);
    }

    public function togglePromotion($id)
    {
        $product = AddProduct::findOrFail($id);
        $user = $this->user;

        $product->is_promoted = !$product->is_promoted;
        $product->save();

        $status = $product->is_promoted ? 'promoted' : 'unpromoted';
        session()->flash('success', "Product has been $status for visitor viewing");

        return redirect()->route('admin_editUser', [$user->id]);
    }

    public function delete($id)
    {
        $user = $this->user;
        // Retrieve the product by its ID
        $productData = AddProduct::findOrFail($id);

        // Delete the product
        $productData->delete();

        session()->flash('success', 'Product Deleted');

        return redirect()->route('admin_editUser', [$user->id]);
    }

    public function render()
    {
        return view('livewire.admin.upload-product');
    }
}
