<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Deposit Transactions</h5>
            <div class="table-responsive table-responsive-x">
                <table class="table table-responsive-x">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Submitted Details</th>
                            <th scope="col">Proof of Payment</th>
                            <th scope="col">Gift Card Images</th>
                            <th scope="col">status</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deposits as $item => $deposit)
                        <tr>
                            <td>{{$item+1}}</td>
                            <td class="small">{{ $deposit->reference ?? '—' }}</td>
                            <td>{{ date("Y M d", strtotime($deposit->created_at))}}</td>
                            <td>${{number_format($deposit->amount)}}</td>
                            <td>
                                {{$deposit->method_name}}
                                @if ($deposit->paymentMethod)
                                    <br><small class="text-muted">{{ $deposit->paymentMethod->type_label }}</small>
                                @endif
                            </td>
                            <td class="small" style="min-width:180px;">
                                @include('components.submitted-details', ['details' => $deposit->details ?? [], 'snapshot' => $deposit->method_snapshot ?? []])
                            </td>
                            <td>
                                @if ($deposit->proof_image)
                                <a href="{{URL('storage/'.$deposit->proof_image)}}" target="blank"><span
                                        class="badge rounded-pill bg-primary"><i class="ri-eye-line"></i>
                                        View</span></a>
                                @endif
                            </td>
                            <td>
                                @if ($deposit->payment_method == "Gift Card")
                                <a href="{{asset('storage/'.$deposit->gift_card_front)}}" target="blank"><span
                                        class="badge rounded-pill bg-primary"><i class="ri-eye-line"></i>
                                        Front</span></a>
                                <a href="{{asset('storage/'.$deposit->gift_card_receipt)}}" target="blank"><span
                                        class="badge rounded-pill bg-info"><i class="ri-eye-line"></i>
                                        Receipt</span></a>
                                @endif

                            </td>
                            <td>
                                @if ($deposit->status == 1)
                                <span class="badge rounded-pill bg-primary">PENDING</span>
                                @elseif($deposit->status == 2)
                                <span class="badge rounded-pill bg-success">Approved</span>
                                @else
                                <span class="badge rounded-pill bg-danger">Denied</span>
                                @endif
                            </td>
                            <td class="small">{{ $deposit->admin_remark ?? '—' }}</td>
                            <td>
                                @if ($deposit->status == 1)
                                <div class="d-flex flex-column gap-1" style="min-width:170px;">
                                    <button class="btn btn-info btn-sm mx-1 confirm"
                                        wire:click.prevent="approve({{ $deposit->id }})" type="submit">
                                        <i class="ri-checkbox-circle-line"></i>
                                        Approve
                                    </button>
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="remarks.{{ $deposit->id }}" placeholder="Rejection reason (optional)">
                                    <button class="btn btn-danger btn-sm mx-1 confirm"
                                        wire:click="decline({{$deposit->id}})" type="submit">
                                        <i class="ri-delete-bin-2-line"></i>
                                        Decline
                                    </button>
                                </div>
                                @else
                                <button class="btn btn-success btn-sm" type="submit" disabled>Completed</button>
                                @endif

                            </td>
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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Withdrawal Transactions</h5>
            <div class="table-responsive table-responsive-x">
                <table class="table table-responsive-x">
                    <thead>
                        <tr>
                            <th scope="col">Reference</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Method</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Account Type</th>
                            <th scope="col">Bank Name</th>
                            <th scope="col">Address </th>
                            <th scope="col">Swift/BIC code</th>
                            <th scope="col">Dynamic Details</th>
                            <th scope="col">status</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($withdrawals as $withdrawal)
                        <tr>
                            <td class="small">{{ $withdrawal->reference ?? '—' }}</td>
                            <td>{{ date("Y M d", strtotime($withdrawal->created_at))}}</td>
                            <td>${{number_format($withdrawal->amount)}}</td>
                            <td>{{ $withdrawal->paymentMethod->name ?? '—' }}</td>
                            <td>{{$withdrawal->account_name}}</td>
                            <td>{{$withdrawal->account_number}}</td>
                            <td>{{$withdrawal->account_type}}</td>
                            <td>{{$withdrawal->bank_name}}</td>
                            <td>{{$withdrawal->address}}</td>
                            <td>{{$withdrawal->swift_bic_code}}</td>
                            <td class="small" style="min-width:180px;">
                                @include('components.submitted-details', ['details' => $withdrawal->details ?? [], 'snapshot' => $withdrawal->method_snapshot ?? []])
                            </td>
                            <td>
                                @if ($withdrawal->status == 1)
                                <span class="badge rounded-pill bg-primary">PENDING</span>
                                @elseif($withdrawal->status == 2)
                                <span class="badge rounded-pill bg-success">Approved</span>
                                @else
                                <span class="badge rounded-pill bg-danger">Denied</span>
                                @endif
                            </td>
                            <td class="small">{{ $withdrawal->admin_remark ?? '—' }}</td>
                            <td>
                                @if ($withdrawal->status == 1)
                                <div class="d-flex flex-column gap-1" style="min-width:170px;">
                                    <button class="btn btn-info btn-sm mx-1 confirm"
                                        wire:click.prevent="withdrawal_approve({{ $withdrawal->id }})" type="submit">
                                        <i class="ri-checkbox-circle-line"></i>
                                        Approve
                                    </button>
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="remarks.{{ $withdrawal->id }}" placeholder="Rejection reason (optional)">
                                    <button class="btn btn-danger btn-sm mx-1 confirm"
                                        wire:click="withdrawal_decline({{$withdrawal->id}})" type="submit">
                                        <i class="ri-delete-bin-2-line"></i>
                                        Decline
                                    </button>
                                </div>
                                @else
                                <button class="btn btn-success btn-sm" type="submit" disabled>Completed</button>
                                @endif

                            </td>
                        </tr>
                        @empty
                        <tr></tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <!-- End Table with stripped rows -->

        </div>
    </div>
</div>
