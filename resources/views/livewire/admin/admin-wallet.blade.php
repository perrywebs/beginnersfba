<div class="card-body">
    <h5 class="card-title">Update Wallet Addresses</h5>

    <!-- Vertical Form -->
    <form class="row g-3" wire:submit.prevent="updateWallet">
        {{-- <div class="col-12">
            <label for="inputBitcoin" class="form-label">Bitcoin</label>
            <input type="text" class="form-control" id="inputBitcoin" wire:model="bitcoin">
        </div> --}}
        <div class="col-12">
            <label for="inputUsdt" class="form-label">USDT</label>
            <input type="text" class="form-control" id="inputUsdt" wire:model="usdt">
        </div>
        {{-- <div class="col-12">
            <label for="inputEthereum" class="form-label">Ethereum</label>
            <input type="text" class="form-control" id="inputEthereum" wire:model="ethereum">
        </div> --}}
        <div class="col-12">
            <label for="inputEthereum" class="form-label">PayPal</label>
            <input type="text" class="form-control" id="inputPayPal" wire:model="paypal">
        </div>
        <div class="col-12">
            <label for="inputCashApp" class="form-label">Cash App</label>
            <input type="text" class="form-control" id="inputCashApp" wire:model="cash_app">
        </div>
        {{-- <div class="col-12">
            <label for="inputMoneyGram" class="form-label">MoneyGram</label>
            <input type="text" class="form-control" id="inputMoneyGram" wire:model="money_gram">
        </div>
        <div class="col-12">
            <label for="inputWesternUnion" class="form-label">Western Union</label>
            <input type="text" class="form-control" id="inputWesternUnion" wire:model="western_union">
        </div> --}}
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form><!-- Vertical Form -->


</div>