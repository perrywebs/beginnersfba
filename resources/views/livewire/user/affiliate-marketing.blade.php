<div class="card-body p-4">

    <!-- Vertical Form -->
    <form class="row g-3" wire:submit="save">
        <div class="col-12">
            <label for="inputNumber" class="col-sm-2 col-form-label">Product Image</label>
            <input type="file" id="photos" wire:model.blur="photo" class="form-control">
            @if ($photo)
            <img src="{{ $photo->temporaryUrl() }}" class="img-fluid img-thumbnail m-2"
                alt="Image Preview" width="50" height="50">
            @endif
            @error('photo')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Product link</label>
            <input type="url" wire:model.blur="productLink" class="form-control" id="inputEmail4">
            @error('productLink')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="floatingTextarea">Product Description</label>
            <textarea class="form-control" wire:model.blur="productDescription" placeholder="Product Description"
                id="floatingTextarea" style="height: 100px;">
            </textarea>
            @error('productDescription')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="number" class="form-label">Price</label>
            <input type="number" wire:model.blur="price" class="form-control" id="number" placeholder="e.g 3000">
            @error('price')
            <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>
        <div class="col-12">
            <label for="floatingSelect">Ecommerce Platform</label>
            <select class="form-select" wire:model.blur="ecommercePlatform" id="floatingSelect"
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
        <div class="text-center">
            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
            <button type="submit" class="btn btn-primary btn-sm px-4">
                Promote
                <x-spinner />
            </button>
        </div>
    </form><!-- Vertical Form -->

</div>