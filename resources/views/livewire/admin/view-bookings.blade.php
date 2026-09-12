<div class="card-body p-4">
    <!-- Vertical Form -->
    <form class="row g-3">
        <div class="col-12">
            <label for="inputNumber">Name</label>
            <input type="text" value="{{$bookings->name}}" class="form-control" disabled>
        </div>
        <div class="col-12">
            <label for="inputNumber">Country</label>
            <input type="text" value="{{$bookings->country}}" class="form-control" disabled>
        </div>
        <div class="col-12">
            <label for="inputNumber">email</label>
            <input type="text" wire:model='email' placeholder="{{$bookings->email}}" class="form-control">
        </div>
        <div class="col-12">
            <label for="inputNumber">Mobile Number</label>
            <input type="text" value="{{$bookings->phone}}" class="form-control" disabled>
        </div>
        <div class="col-12">
            <label for="inputNumber">Did you watch the entire training before applying?</label>
            <input type="text" value="{{$bookings->watch_training_before_applying}}" class="form-control" disabled>
        </div>
        <div class="col-12">
            <label for="inputNumber">What is your budget to invest in your business?</label>
            <input type="text" value="{{$bookings->budget_to_invest}}" class="form-control" disabled>
        </div>
        <div class="col-12">
            <label for="floatingTextarea">What is your biggest struggle in starting or growing an BeginnersFba business?
                *</label>
            <textarea class="form-control" placeholder="Product Description" id="floatingTextarea"
                style="height: 100px;" disabled>
                {{$bookings->struggle_growing_business}}
            </textarea>
        </div>
        <div class="col-12">
            <label for="floatingTextarea"> What is your experience selling products on Amazon? *</label>
            <textarea class="form-control" placeholder="Product Description" id="floatingTextarea"
                style="height: 100px;" disabled>
                {{$bookings->experience_selling_on_amazon}}
            </textarea>
        </div>
        <div class="col-12">
            <label for="inputNumber">If you're accepted, how soon can you get started? *</label>
            <input type="text" value="{{$bookings->how_soon_will_you_start}}" class="form-control" disabled>
        </div>
        <div class="col-12">
            <label for="inputNumber">Do you PROMISE that if you qualify you will show up to the call? *</label>
            <input type="text" value="{{$bookings->promise}}" class="form-control" disabled>
        </div>
        <div class="text-center">
            <button type="button" wire:click='decline({{$bookings->id}})' wire:confirm='Are you sure you want to Decline this booking ?' class="btn btn-danger btn-sm">
                Decline
                <x-target-spinner target="decline" />
            </button>
            <button type="button" wire:click='approve({{$bookings->id}})' wire:confirm='Are you sure you want to Approve this booking ?' class="btn btn-primary btn-sm px-4">
                Approve
                <x-target-spinner target="approve" />
            </button>
        </div>
    </form><!-- Vertical Form -->

</div>