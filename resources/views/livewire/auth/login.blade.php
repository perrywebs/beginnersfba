<div>
    <form class="flex-c" wire:submit='login'>
        <div class="input-box">
            <span class="label">E-mail</span>
            <div class=" flex-r input">
                <input type="text" placeholder="name@abc.com" wire:model='email'  required>
                <i class="fas fa-at"></i>
            </div>
        </div>

        <div class="input-box">
            <span class="label">Password</span>
            <div class="flex-r input">
                <input type="password" placeholder="" wire:model='password' required>
                <i class="fas fa-lock"></i>
            </div>
        </div>

        <button class="btn" type="submit">
            Login
            <x-spinner />
        </button>

    </form>
    <span class="extra-line">
        <span>Book Now</span>
        <a href="/booking">Sign up</a>
    </span>
</div>