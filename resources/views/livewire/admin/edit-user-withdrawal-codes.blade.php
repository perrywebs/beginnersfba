<div class="row">
    <!-- COL START -->
    <div class="col-sm-12 col-md-10  col-xl-10">
        <div class="card">
            <div class="card-body p-3">
                <form wire:submit="editTaxCode">
                    <div class="form-group">
                        <label class="form-label">Edit Tax Code</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="edit_tax_code" class="form-control form-control-sm">
                            <span class="input-group-btn mx-2">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    SAVE
                                </button>
                            </span>
                        </div>
                        @error('edit_tax_code')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <hr>
                <form wire:submit="editImfCode">
                    <div class="form-group">
                        <label class="form-label">Edit IMF Code</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="edit_imf_code" class="form-control form-control-sm">
                            <span class="input-group-btn mx-2">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    SAVE
                                </button>
                            </span>
                        </div>
                        @error('edit_imf_code')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <hr>
                <form wire:submit="editCotCode">
                    <div class="form-group">
                        <label class="form-label">Edit COT Code</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="edit_cot_code" class="form-control form-control-sm">
                            <span class="input-group-btn mx-2">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    SAVE
                                </button>
                            </span>
                        </div>
                        @error('edit_cot_code')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>