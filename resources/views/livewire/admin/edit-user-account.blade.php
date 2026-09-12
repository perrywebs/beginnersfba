<div class="row">
    <!-- COL START -->
    <div class="col-sm-12 col-md-6  col-xl-4">
        <div class="card">
            <div class="card-body p-3">
                <form wire:submit="credit_balance">
                    <div class="form-group">
                        <label class="form-label">Credit user Balance Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="credit_bal_amount"
                                class="form-control form-control-sm" placeholder="Credit User Balance">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    credit
                                </button>
                            </span>
                        </div>
                        @error('credit_bal_amount')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <hr>
                <form wire:submit="debit_balance">
                    <div class="form-group">
                        <label class="form-label">Debit user Balance Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="debit_bal_amount"
                                class="form-control form-control-sm" placeholder="Debit User Balance">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-danger please-wait-btn" type="submit">
                                    Debit
                                </button>
                            </span>
                        </div>
                        @error('debit_bal_amount')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END -->
    <!-- COL START -->
    <div class="col-sm-12 col-md-6  col-xl-4">
        <div class="card">
            <div class="card-body p-3">
                <form wire:submit="increase_user_sales">
                    <div class="form-group">
                        <label class="form-label">Increase user Sales Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="increase_sales"
                                class="form-control form-control-sm" placeholder="Increase user Sales Manually">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    save
                                </button>
                            </span>
                        </div>
                        @error('increase_sales')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <hr>
                <form wire:submit="reduce_user_sales">
                    <div class="form-group">
                        <label class="form-label">Reduce user Sales Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="reduce_sales"
                                class="form-control form-control-sm" placeholder="Reduce user Sales Manually">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-danger please-wait-btn" type="submit">
                                    save
                                </button>
                            </span>
                        </div>
                        @error('reduce_sales')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END -->
    <!-- COL START -->
    {{-- <div class="col-sm-12 col-md-6  col-xl-4">
        <div class="card">
            <div class="card-body p-3">
                <form wire:submit="increase_user_total_sales">
                    <div class="form-group">
                        <label class="form-label">Increase user Total Sales Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="increase_total_sales"
                                class="form-control form-control-sm" placeholder="Increase user Total Sales Manually">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    save
                                </button>
                            </span>
                        </div>
                        @error('increase_total_sales')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <hr>
                <form wire:submit="reduce_user_total_sales">
                    <div class="form-group">
                        <label class="form-label">Reduce user Total Sales Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="reduce_total_sales"
                                class="form-control form-control-sm" placeholder="Reduce user Total Sales Manually">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-danger please-wait-btn" type="submit">
                                    save
                                </button>
                            </span>
                        </div>
                        @error('reduce_sales')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END --> --}}
    <!-- COL START -->
    <div class="col-sm-12 col-md-6  col-xl-4">
        <div class="card">
            <div class="card-body p-3">
                <form wire:submit="increase_user_total_products">
                    <div class="form-group">
                        <label class="form-label">Increase user Total Products Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="increase_total_product"
                                class="form-control form-control-sm" placeholder="Increase user Total Products Manually">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    save
                                </button>
                            </span>
                        </div>
                        @error('increase_total_product')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <hr>
                <form wire:submit="reduce_user_total_products">
                    <div class="form-group">
                        <label class="form-label">Reduce user Total Sales Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="reduce_total_products"
                                class="form-control form-control-sm" placeholder="Reduce user Total Sales Manually">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-danger please-wait-btn" type="submit">
                                    save
                                </button>
                            </span>
                        </div>
                        @error('reduce_user_total_products')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-6  col-xl-4">
        <div class="card">
            <div class="card-body p-3">
                <form wire:submit="last_30_days">
                    <div class="form-group">
                        <label class="form-label">Edit user Last 30 days</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="increase_last_30_days"
                                class="form-control form-control-sm" placeholder="{{$user_data->last_30_days}}">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-primary please-wait-btn" type="submit">
                                    save
                                </button>
                            </span>
                        </div>
                        @error('increase_last_30_days')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <hr>
                <form wire:submit="last_year">
                    <div class="form-group">
                        <label class="form-label">Edit user last year</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="increase_last_year"
                                class="form-control form-control-sm" placeholder="{{$user_data->last_year}}">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-info please-wait-btn" type="submit">
                                    save
                                </button>
                            </span>
                        </div>
                        @error('increase_last_year')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-6  col-xl-4">
        <div class="card">
            <div class="card-body p-3">
                <form wire:submit="returns">
                    <div class="form-group">
                        <label class="form-label">Edit returns</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="edit_returns"
                                class="form-control form-control-sm" placeholder="{{$user_data->returns}}">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-primary please-wait-btn" type="submit">
                                    save
                                </button>
                            </span>
                        </div>
                        @error('edit_returns')
                        <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END -->
</div>
