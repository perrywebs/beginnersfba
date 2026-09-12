<div class="card" >
    <div class="card-body">
        <h5 class="card-title">Upload Gift Card for Payment</h5>

        <!-- Vertical Form -->
        <form class="row g-3" wire:submit='fund'>
            <div class="col-12">
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Gift Card Front:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" wire:model.blur='gift_card_front'>
                        <div class="mt-3">
                            @if ($gift_card_front)
                            <img src="{{ $gift_card_front->temporaryUrl() }}" class="img-fluid img-thumbnail"
                                alt="Image Preview" width="100" height="100">
                            @endif
                        </div>
                        @error('gift_card_front')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Gift Card Receipt: </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" wire:model.blur='gift_card_receipt'>
                        <div class="mt-3">
                            @if ($gift_card_receipt)
                            <img src="{{ $gift_card_receipt->temporaryUrl() }}" class="img-fluid img-thumbnail"
                                alt="Image Preview" width="100" height="100">
                            @endif
                        </div>
                        @error('gift_card_receipt')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @if (!$errors->any())
                <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                <button type="submit" class="btn btn-primary btn-sm">
                    Pay
                    <x-spinner />
                </button>
                @else
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <button class="btn btn-danger" disabled>Error</button>
                </div>
                @endif
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>