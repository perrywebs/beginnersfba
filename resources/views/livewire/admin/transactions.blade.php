<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Deposit Transactions</h5>
            <div class="table-responsive table-responsive-x">
                <table class="table table-responsive-x">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Proof of Payment</th>
                            <th scope="col">Gift Card Images</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deposits as $item => $deposit)
                        <tr>
                            <td>{{$item+1}}</td>
                            <td>{{ date("Y M d", strtotime($deposit->created_at))}}</td>
                            <td>${{number_format($deposit->amount)}}</td>
                            <td>{{$deposit->payment_method}}</td>
                            <td>
                                <a href="{{URL('storage/'.$deposit->proof_image)}}" target="blank"><span
                                        class="badge rounded-pill bg-primary"><i class="ri-eye-line"></i>
                                        View</span></a>
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
                            <td class="d-flex">
                                @if ($deposit->status == 1)
                                <button class="btn btn-info btn-sm mx-1 confirm"
                                    wire:click.prevent="approve({{ $deposit->id }})" type="submit">
                                    <i class="ri-checkbox-circle-line"></i>
                                    Approve
                                </button>
                                <button class="btn btn-danger btn-sm mx-1 confirm"
                                    wire:click="decline({{$deposit->id}})" type="submit">
                                    <i class="ri-delete-bin-2-line"></i>
                                    Decline
                                </button>
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
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Account Type</th>
                            <th scope="col">Bank Name</th>
                            <th scope="col">Address </th>
                            <th scope="col">Swift/BIC code</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($withdrawals as $withdrawal)
                        <tr>
                            <td>{{ date("Y M d", strtotime($withdrawal->created_at))}}</td>
                            <td>${{number_format($withdrawal->amount)}}</td>
                            <td>{{$withdrawal->account_name}}</td>
                            <td>{{$withdrawal->account_number}}</td>
                            <td>{{$withdrawal->account_type}}</td>
                            <td>{{$withdrawal->bank_name}}</td>
                            <td>{{$withdrawal->address}}</td>
                            <td>{{$withdrawal->swift_bic_code}}</td>
                            <td>
                                @if ($withdrawal->status == 1)
                                <span class="badge rounded-pill bg-primary">PENDING</span>
                                @elseif($withdrawal->status == 2)
                                <span class="badge rounded-pill bg-success">Approved</span>
                                @else
                                <span class="badge rounded-pill bg-danger">Denied</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                @if ($withdrawal->status == 1)
                                <button class="btn btn-info btn-sm mx-1 confirm"
                                    wire:click.prevent="withdrawal_approve({{ $withdrawal->id }})" type="submit">
                                    <i class="ri-checkbox-circle-line"></i>
                                    Approve
                                </button>
                                <button class="btn btn-danger btn-sm mx-1 confirm"
                                    wire:click="withdrawal_decline({{$withdrawal->id}})" type="submit">
                                    <i class="ri-delete-bin-2-line"></i>
                                    Decline
                                </button>
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