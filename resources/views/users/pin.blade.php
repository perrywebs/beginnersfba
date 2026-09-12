@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Transfer Process</h1>
</div><!-- End Page Title -->
<div class="m-3">
    <button type="button" class="dash-back-btn" onclick="goBack()">
        <i class="bi bi-arrow-left"></i> Back
    </button>
</div>
<x-error-message textColor="text-white" />
<hr>
<section class="section" style="min-height: 67vh">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Transfer Process Codes</h5>

                    @php
                        $step = session('withdrawal_step', 1); // Default to step 1
                    @endphp

                    @if ($step === 1)
                        <div>
                            <label for="tax_code"><b>Enter Tax Code</b></label>
                            <input type="text" id="tax_code" wire:model.defer="tax_code" class="form-control">
                            <button class="btn btn-primary mt-2" wire:click="validateTaxCode">Submit Tax Code</button>
                        </div>
                    @elseif ($step === 2)
                        <div>
                            <label for="imf_code"><b>Enter IMF Code</b></label>
                            <input type="text" id="imf_code" wire:model.defer="imf_code" class="form-control">
                            <button class="btn btn-primary mt-2" wire:click="validateImfCode">Submit IMF Code</button>
                        </div>
                    @elseif ($step === 3)
                        <div>
                            <label for="cot_code"><b>Enter COT Code</b></label>
                            <input type="text" id="cot_code" wire:model.defer="cot_code" class="form-control">
                            <button class="btn btn-primary mt-2" wire:click="validateCotCode">Submit COT Code</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
