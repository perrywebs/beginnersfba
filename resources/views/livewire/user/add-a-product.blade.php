<div>
    <!-- Vertical Form -->
    <form class="row g-3" wire:submit='add'>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Product Name</label>
            <input type="text" wire:model="productName" class="form-control" id="inputEmail4">
            @error('productName')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Upload Photos of Product :</label>
                <div class="col-sm-10">
                    <input type="file" id="photos" wire:model="photos" multiple class="form-control"
                        accept="image/*" wire:loading.attr="disabled" wire:target="photos">

                    <div wire:loading wire:target="photos" class="mt-2">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="ms-2">Uploading...</span>
                    </div>

                    @if ($photos)
                        <div class="mt-2">
                            <small class="text-muted">Selected files: {{ count($photos) }}</small>
                        </div>
                    @endif

                    @error('photos')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                    @error('photos.*')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Product Quantity</label>
            <input type="number" wire:model="productQuantity" class="form-control" id="inputEmail4">
            @error('productQuantity')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="floatingTextarea">Product Description</label>
            <textarea class="form-control" wire:model="productDescription" placeholder="Product Description" id="floatingTextarea"
                style="height: 100px;">
            </textarea>
            @error('productDescription')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="number" class="form-label">Price</label>
            <input type="number" wire:model="price" class="form-control" id="number" placeholder="e.g 3000">
            @error('price')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="floatingSelect">Ecommerce Platform</label>
            <select class="form-select" wire:model="ecommercePlatform" id="floatingSelect"
                aria-label="Ecommerce Platform">
                <option value="">E.g Amazon</option>
                <option value="Amazon">Amazon</option>
                <option value="Shopify">Shopify</option>
                <option value="Noon">Noon</option>
                <option value="Other">Other</option>
            </select>
            @error('ecommercePlatform')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
            <button type="submit" class="btn btn-primary btn-sm" wire:loading.attr="disabled" wire:target="add">
                <span wire:loading.remove wire:target="add">Upload</span>
                <span wire:loading wire:target="add">
                    Uploading
                    <x-spinner />
                </span>
            </button>
        </div>
    </form><!-- Vertical Form -->
</div>