<div>
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <h5 class="mb-0 fw-bold text-dark">KYC Verification Requests</h5>
            <div style="max-width: 300px; width: 100%;">
                <input type="text" class="form-control form-control-sm" placeholder="Search user name or email..."
                    wire:model.live.debounce.300ms="search">
            </div>
        </div>

        <div class="card-body p-0">
            <!-- Flash Messages -->
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show m-3 mb-0" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show m-3 mb-0" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Front Doc</th>
                            <th>Back Doc</th>
                            <th>Status</th>
                            <th>Submitted At</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($documents as $doc)
                            <tr>
                                <td>{{ $loop->iteration + ($documents->currentPage() - 1) * $documents->perPage() }}
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $doc->user->name ?? 'N/A' }}</div>
                                    <small class="text-muted">{{ $doc->user->email ?? 'N/A' }}</small>
                                </td>
                                <td>
                                    @if ($doc->front_path)
                                        <button class="btn btn-sm btn-outline-primary"
                                            wire:click="openPreview('{{ $doc->front_path }}', '{{ $doc->user->name }} - Front Document')"
                                            type="button">
                                            <i class="bi bi-eye"></i> Preview
                                        </button>
                                    @else
                                        <span class="text-muted fs-7">None</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($doc->back_path)
                                        <button class="btn btn-sm btn-outline-primary"
                                            wire:click="openPreview('{{ $doc->back_path }}', '{{ $doc->user->name }} - Back Document')"
                                            type="button">
                                            <i class="bi bi-eye"></i> Preview
                                        </button>
                                    @else
                                        <span class="text-muted fs-7">None</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($doc->status === 'approved')
                                        <span
                                            class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">Approved</span>
                                    @elseif ($doc->status === 'rejected')
                                        <span
                                            class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1">Declined</span>
                                    @else
                                        <span
                                            class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Pending</span>
                                    @endif
                                </td>
                                <td>{{ $doc->created_at ? $doc->created_at->format('M d, Y h:i A') : 'N/A' }}</td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <button class="btn btn-sm btn-success"
                                            wire:click="approve({{ $doc->id }})" wire:loading.attr="disabled"
                                            @if ($doc->status === 'approved') disabled @endif>
                                            <i class="bi bi-check-circle me-1"></i> Approve
                                        </button>
                                        <button class="btn btn-sm btn-danger" wire:click="decline({{ $doc->id }})"
                                            wire:loading.attr="disabled"
                                            @if ($doc->status === 'rejected') disabled @endif>
                                            <i class="bi bi-x-circle me-1"></i> Decline
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No KYC documents found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($documents->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                {{ $documents->links() }}
            </div>
        @endif
    </div>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="kycPreviewModal" tabindex="-1" aria-labelledby="kycPreviewModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="kycPreviewModalLabel">{{ $previewTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-3 bg-light">
                    @if ($previewImage)
                        <img src="{{ $previewImage }}" alt="Document Preview" class="img-fluid rounded shadow-sm"
                            style="max-height: 70vh; object-fit: contain;">
                    @else
                        <div class="spinner-border text-primary my-5" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal Trigger Script -->
    <script>
        document.addEventListener('livewire:initialized', () => {
            const previewModal = new bootstrap.Modal(document.getElementById('kycPreviewModal'));

            Livewire.on('open-kyc-modal', () => {
                previewModal.show();
            });
        });
    </script>
</div>
