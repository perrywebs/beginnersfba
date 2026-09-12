<div class="card">
    <div class="card-body">
        <h5 class="card-title">Product Uploads</h5>
        <div class="table-responsive table-responsive-x">
            <table class="table table-responsive-x">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Product stock Status</th>
                        <th scope="col">Product Status</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Product Ecommerce Platform</th>
                        <th scope="col">Visitor Promotion</th>
                        <th scope="col">stock Actions</th>
                        <th scope="col">status Actions</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($add_products as $item => $add_product)
                    <tr wire:key='{{$add_product->id}}'>
                        <td>{{$item+1}}</td>
                        <td>{{ date("Y M d", strtotime($add_product->created_at))}}</td>
                        <td>
                            @if ($add_product->soldInStock == '1')
                            <span class="text-info">In stock</span>
                            @else
                            <span class="text-danger">Sold Out</span>
                            @endif
                        </td>
                        <td>
                            @if ($add_product->status == 1)
                                <span class="badge rounded-pill bg-info p-2">
                                    {{ config('app.add_product_status')[$add_product->status] }}
                                </span>
                            @elseif ($add_product->status == 2)
                                <span class="badge rounded-pill bg-success p-2">{{ config('app.add_product_status')[$add_product->status] }}</span>
                            @elseif ($add_product->status == 3)
                                <span class="badge rounded-pill bg-danger p-2">{{ config('app.add_product_status')[$add_product->status] }}</span>
                            @else
                                <span class="badge rounded-pill bg-danger p-2">ERROR Status Unknown :)</span>
                            @endif
                        </td>
                        <td>{{$add_product->productName}}</td>
                        <td>
                            <a href="{{route('admin_viewproducts',[$user->id,$add_product->id])}}" target="blank">
                                <span class="badge rounded-pill bg-primary">
                                    <i class="ri-eye-line"></i>
                                    View Products Image
                                </span>
                            </a>
                        </td>
                        <td>${{$add_product->price}}</td>
                        <td style="width:30px">
                            <form wire:submit.prevent="editQuantity({{ $add_product->id }})">
                                <div class="form-group">
                                    <input type="number" wire:model="quantities.{{ $add_product->id }}"
                                        class="form-control form-control-sm"
                                        placeholder="{{ $add_product->productQuantity }}">
                                    <span class="input-group-btn ms-0">
                                        <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                            Save
                                        </button>
                                    </span>
                                    @error('quantities.' . $add_product->id)
                                    <em class="text-danger">{{ $message }}</em>
                                    @enderror
                                </div>
                            </form>
                        </td>
                        <td>{{$add_product->productDescription}}</td>
                        <td>{{$add_product->ecommercePlatform}}</td>

                        <td>
                            @if ($add_product->is_promoted)
                                <span class="badge bg-success border p-2 d-inline-flex align-items-center">
                                    <i class="bi bi-eye-fill me-1"></i> Promoted
                                </span>
                                <button type="button"
                                    wire:click='togglePromotion({{$add_product->id}})'
                                    wire:confirm='Are you sure you want to unpromote this product? It will no longer be visible to public visitors.'
                                    class="badge bg-warning border m-1" style="cursor:pointer;">
                                    Unpromote
                                </button>
                            @else
                                <span class="badge bg-secondary border p-2 d-inline-flex align-items-center">
                                    <i class="bi bi-eye-slash me-1"></i> Not Promoted
                                </span>
                                <button type="button"
                                    wire:click='togglePromotion({{$add_product->id}})'
                                    wire:confirm='Are you sure you want to promote this product for public visitor viewing?'
                                    class="badge bg-primary border m-1" style="cursor:pointer;">
                                    Promote
                                </button>
                            @endif
                        </td>

                        <td class="d-flex">
                            <span><button type="button" wire:click='soldOut({{$add_product->id}})'
                                    wire:confirm='Are you sure you want to declare this product unavailable in stock ?'
                                    class="badge bg-danger border m-1">sold out</button></span>
                            <span><button type="button" wire:click='inStock({{$add_product->id}})'
                                    wire:confirm='Are you sure you want to declare this product available in stock ?'
                                    class="badge bg-info border m-1">in stock</button></span>
                            {{-- <button type="button" class="btn btn-sm btn-danger m-1">Sold out</button> --}}
                        </td>
                        <td>
                            <span><button type="button" wire:click='acceptStatus({{$add_product->id}})'
                                wire:confirm='Are you sure you want to Accept this product ?'
                                class="badge bg-success border m-1">Accept</button></span>
                                <span><button type="button" wire:click='denyStatus({{$add_product->id}})'
                                    wire:confirm='Are you sure you want to Deny this product ?'
                                    class="badge bg-danger border m-1">Deny</button></span>
                        </td>
                        <td>
                            <button type="button" wire:click='delete({{$add_product->id}})'
                                wire:confirm='Are you sure you want to delete this product ?'
                                class="btn btn-sm btn-danger m-1">
                                <i class="bi bi-archive-fill"></i>
                            </button>
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
