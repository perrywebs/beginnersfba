<div class="modal fade" id="fund" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Funds</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit='fund'>
                <div class="modal-body">
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Payment Methods</label>
                        <select class="form-select" wire:model.live='payment_method' id="floatingSelect"
                            aria-label="Floating label select example" required>
                            <option value="">Payment Methods</option>
                            {{-- <option value="Bitcoin">Bitcoin</option> --}}
                            {{-- <option value="Ethereum">Ethereum</option> --}}
                            <option value="PayPal">PayPal</option>
                            {{-- <option value="USDT">USDT</option> --}}
                            {{-- <option value="MoneyGram">MoneyGram</option> --}}
                            {{-- <option value="WesternUnion">Western Union</option> --}}
                            <option value="Cash App">Cash App</option>
                            <option value="GiftCard">GiftCard</option>
                        </select>
                        @error('payment_method')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Amount</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input wire:model.live='amount' type="text" class="form-control"
                                aria-label="Amount (to the nearest dollar)" required>
                        </div>
                        @error('amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="col-12 my-4 {{ $display }}">
                        <label for="inputEmail4" class="form-label">Payment Methods</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="copyAddress" value="{{ $copyAddress }}"
                                aria-label="Amount (to the nearest dollar)" readonly>
                            <button type="button" id="copyButton"
                                class="btn btn-sm btn-primary input-group-text">Copy</button>
                        </div>
                    </div>
                    <div class="col-12 my-3 {{ $display }}">
                        <label class="form-label">Proof of Payment</label>

                        <input type="file" class="form-control" wire:model="proof" accept="image/*" required>

                        @error('proof')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror

                        <!-- Preview -->
                        @if ($proof)
                            <div class="mt-2">
                                <img src="{{ $proof->temporaryUrl() }}" class="img-fluid rounded"
                                    style="max-height:200px;">
                            </div>
                        @endif
                    </div>
                </div>


                <div class="modal-footer">
                    @if (!$errors->any())
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
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
            </form>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
