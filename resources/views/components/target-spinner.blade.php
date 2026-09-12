@props(['target' => ''])

<span wire:loading wire:target="{{ $target }}">
    <span class="spinner-border spinner-border-sm mx-2 text-success fs-5"  role="status" aria-hidden="true"></span>
    <span class="visually-hidden">Loading...</span>
</span>