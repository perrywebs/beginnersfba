<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transfer to bank</h5>
            <div class="card">
                <div class="card-body p-4">
                    @if($step === 1)
                    <!-- Withdrawal Details Form -->
                    <form wire:submit.prevent="submitWithdrawalDetails">
                        <div class="col-12">
                            <label class="form-label">Payment Method <span class="text-danger">*</span></label>
                            <select wire:model.live="payment_method_id" class="form-select" required>
                                @forelse ($methods as $m)
                                    <option value="{{ $m->id }}">{{ $m->name }} ({{ $m->type_label }})</option>
                                @empty
                                    <option value="">No withdrawal methods available</option>
                                @endforelse
                            </select>
                            @error('payment_method_id')
                            <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Amount (USD) <em class="btn btn-primary"
                                    @disabled(true)>Balance:
                                    ${{auth()->user()->account_bal}}</em></label>
                            <input type="number" step="0.01" wire:model.blur="amount" class="form-control" id="inputEmail4">
                            @error('amount')
                            <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>

                        @if (! empty($methodFields))
                            @foreach ($methodFields as $field)
                                <div class="col-12">
                                    <label class="form-label">{{ $field->label }} @if($field->is_required)<span class="text-danger">*</span>@endif</label>
                                    @if ($field->type === 'textarea')
                                        <textarea wire:model.blur="dynamic.{{ $field->name }}" class="form-control" rows="3"
                                            placeholder="{{ $field->placeholder }}"></textarea>
                                    @elseif($field->type === 'select')
                                        <select wire:model.blur="dynamic.{{ $field->name }}" class="form-select">
                                            <option value="">-- Select {{ $field->label }} --</option>
                                            @foreach ($field->options_list as $option)
                                                <option value="{{ $option }}">{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="{{ $field->type === 'tel' ? 'tel' : $field->type }}"
                                            wire:model.blur="dynamic.{{ $field->name }}" class="form-control"
                                            placeholder="{{ $field->placeholder }}">
                                    @endif
                                    @if ($field->help_text)
                                        <small class="form-text text-muted">{{ $field->help_text }}</small>
                                    @endif
                                    @error('dynamic.'.$field->name)
                                    <em class="text-danger d-block">{{ $message }}</em>
                                    @enderror
                                </div>
                            @endforeach
                        @else
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Acount Name</label>
                            <input type="text" wire:model.blur="account_name" class="form-control" id="inputEmail4">
                            @error('account_name')
                            <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="number" class="form-label">Bank Name</label>
                            <input type="text" wire:model.blur="bank_name" class="form-control" id="number">
                            @error('bank_name')
                            <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="number" class="form-label">Account Number</label>
                            <input type="number" wire:model.blur="account_number" class="form-control" id="number">
                            @error('account_number')
                            <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="number" class="form-label">Account Type</label>
                            <input type="text" wire:model.blur="account_type" class="form-control" id="number">
                            @error('account_type')
                            <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="number" class="form-label">Full Address</label>
                            <input type="text" wire:model.blur="address" class="form-control"
                                placeholder="E.g 1234 Elm Street, Apt 56, Springfield, IL 62704, USA">
                            @error('address')
                            <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="number" class="form-label">SWIFT/BIC Code</label>
                            <input type="text" wire:model.blur="swift_bic_code" class="form-control" id="number">
                            @error('swift_bic_code')
                            <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>
                        @endif
                        <hr>
                        <div class="text-center">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm px-4">
                                Request
                                <x-spinner />
                            </button>
                        </div>
                    </form><!-- Vertical Form -->
                    @elseif($step === 2)
                    <!-- Tax Code Step -->
                    <div>
                        <div>Please <a href="mailto:{{ config('app.Admin_email') }}">Contact Service</a> Desk for Tax
                            Code:</div>
                        <label for="tax_code">Tax Code</label>
                        <input type="text" wire:model="tax_code" class="form-control">
                        @if (!empty($error))
                        <em class="text-danger">{{$error}}</em>
                        @endif
                        <hr>
                        <button type="button" wire:click="validateTaxCode" class="btn btn-primary">Submit Code
                            <x-spinner />
                        </button>
                    </div>
                    @elseif($step === 3)
                    <!-- IMF Code Step -->
                    <div>
                        <div>Please <a href="mailto:{{ config('app.Admin_email') }}">Contact Service</a> Desk for IMF
                            Code:</div>
                        <label for="imf_code">IMF Code</label>
                        <input type="text" wire:model="imf_code" class="form-control">
                        @if (!empty($error))
                        <em class="text-danger">{{$error}}</em>
                        @endif
                        <hr>
                        <button type="button" wire:click="validateImfCode" class="btn btn-primary">Submit Code
                            <x-spinner />
                        </button>
                    </div>
                    @elseif($step === 4)
                    <!-- COT Code Step -->
                    <div>
                        <div>Please <a href="mailto:{{ config('app.Admin_email') }}">Contact Service</a> Desk for COT
                            Code:</div>
                        <label for="cot_code">COT Code</label>
                        <input type="text" wire:model="cot_code" class="form-control">
                        @if (!empty($error))
                        <em class="text-danger">{{$error}}</em>
                        @endif
                        <hr>
                        <button type="button" wire:click="validateCotCode" class="btn btn-primary">Confirm Withdrawal
                            <x-spinner />
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if ($step === 1)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transfer History</h5>
            <div class="table-responsive table-responsive-x">
                <table class="table datatable table-responsive-x">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Status</th>
                            <th scope="col">Admin Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($withdrawals as $item => $withdrawal)
                        <tr>
                            <th scope="row">{{ $item+1}}</th>
                            <td class="small">{{ $withdrawal->reference ?? '—' }}</td>
                            <td>{{ date('Y/M/d h:i a', strtotime($withdrawal->created_at)) }}</td>
                            <td>${{ number_format($withdrawal->amount) }}</td>
                            <td>{{ $withdrawal->account_name }}</td>
                            <td>{{ $withdrawal->account_number }}</td>
                            <td>{{ $withdrawal->paymentMethod->name ?? ('Bank - '.$withdrawal->bank_name) }}</td>
                            <td>
                                @if ($withdrawal->status == 1)
                                <span class="badge rounded-pill bg-primary">PENDING</span>
                                @elseif($withdrawal->status == 2)
                                <span class="badge rounded-pill bg-success">Completed</span>
                                @else
                                <span class="badge rounded-pill bg-danger">Denied</span>
                                @endif
                            </td>
                            <td class="small">{{ $withdrawal->admin_remark ?? '—' }}</td>
                        </tr>
                        @empty
                        <tr>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- End Table with stripped rows -->

        </div>
    </div>
    @endif

</div>
