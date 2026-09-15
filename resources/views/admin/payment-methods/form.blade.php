@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>{{ $method->exists ? 'Edit Payment Method' : 'Add Payment Method' }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_payment_methods.index') }}">Payment Methods</a></li>
            <li class="breadcrumb-item active">{{ $method->exists ? 'Edit' : 'Create' }}</li>
        </ol>
    </nav>
</div>

<x-error-message />

<form method="POST" enctype="multipart/form-data"
    action="{{ $method->exists ? route('admin_payment_methods.update', $method) : route('admin_payment_methods.store') }}">
    @csrf
    @if ($method->exists)
        @method('PUT')
    @endif

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Basic Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Payment Method Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required maxlength="100"
                                    value="{{ old('name', $method->name) }}" placeholder="e.g. Zelle, Bitcoin, Wise">
                                @error('name')<em class="text-danger">{{ $message }}</em>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Type / Category <span class="text-danger">*</span></label>
                                <select name="type" class="form-select" required>
                                    @foreach ($types as $key => $label)
                                        <option value="{{ $key }}" @selected(old('type', $method->type) === $key)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('type')<em class="text-danger">{{ $message }}</em>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Short Description</label>
                                <input type="text" name="description" class="form-control" maxlength="500"
                                    value="{{ old('description', $method->description) }}" placeholder="Shown to users when choosing a method">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Payment Instructions</label>
                                <textarea name="instructions" class="form-control" rows="4" maxlength="5000"
                                    placeholder="Step-by-step instructions shown to the user (account numbers, wallet addresses, etc.)">{{ old('instructions', $method->instructions) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image / Logo (upload)</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <small class="text-muted">JPG, PNG, WEBP or GIF, max 2MB.</small>
                                @error('image')<em class="text-danger d-block">{{ $message }}</em>@enderror
                                @if ($method->image_path)
                                    <div class="mt-2">
                                        <img src="{{ $method->image_src }}" alt="" style="max-height:80px;" class="rounded border">
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" name="remove_image" value="1" id="remove_image">
                                            <label class="form-check-label small" for="remove_image">Remove current image</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">...or HTTPS Image URL</label>
                                <input type="url" name="image_url" class="form-control"
                                    value="{{ old('image_url', $method->image_url) }}" placeholder="https://...">
                                @error('image_url')<em class="text-danger d-block">{{ $message }}</em>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Dynamic Fields</h5>
                            <button type="button" class="btn btn-success btn-sm" id="add-field-btn">
                                <i class="bi bi-plus-circle"></i> Add Field
                            </button>
                        </div>
                        <p class="small text-muted">Define what the user must fill in (e.g. Wallet Address, Network). Select fields need one option per line or comma-separated.</p>
                        <div id="fields-wrapper" class="d-flex flex-column gap-3"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Availability</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="deposit_enabled" value="1" id="dep"
                                @checked(old('deposit_enabled', $method->deposit_enabled))>
                            <label class="form-check-label" for="dep">Deposit enabled</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="withdrawal_enabled" value="1" id="wd"
                                @checked(old('withdrawal_enabled', $method->withdrawal_enabled))>
                            <label class="form-check-label" for="wd">Withdrawal enabled</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="active"
                                @checked(old('is_active', $method->is_active))>
                            <label class="form-check-label" for="active">Active (visible to users)</label>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="sort_order" class="form-control" min="0"
                                value="{{ old('sort_order', $method->sort_order ?? 0) }}">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Limits</h5>
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label">Min Deposit</label>
                                <input type="number" step="0.01" min="0" name="min_deposit" class="form-control" value="{{ old('min_deposit', $method->min_deposit) }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Max Deposit</label>
                                <input type="number" step="0.01" min="0" name="max_deposit" class="form-control" value="{{ old('max_deposit', $method->max_deposit) }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Min Withdrawal</label>
                                <input type="number" step="0.01" min="0" name="min_withdrawal" class="form-control" value="{{ old('min_withdrawal', $method->min_withdrawal) }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Max Withdrawal</label>
                                <input type="number" step="0.01" min="0" name="max_withdrawal" class="form-control" value="{{ old('max_withdrawal', $method->max_withdrawal) }}">
                            </div>
                        </div>
                        @error('max_deposit')<em class="text-danger d-block">{{ $message }}</em>@enderror
                        @error('max_withdrawal')<em class="text-danger d-block">{{ $message }}</em>@enderror
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">{{ $method->exists ? 'Save Changes' : 'Create Payment Method' }}</button>
                    <a href="{{ route('admin_payment_methods.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </section>
</form>

@php
    $existingFields = old('fields', ($method->exists ? $method->fields->map(fn ($f) => [
        'id' => $f->id,
        'label' => $f->label,
        'type' => $f->type,
        'options_text' => implode("\n", $f->options_list),
        'placeholder' => $f->placeholder,
        'help_text' => $f->help_text,
        'is_required' => $f->is_required,
        'show_on' => $f->show_on,
        'sort_order' => $f->sort_order,
        'is_active' => $f->is_active,
    ])->values()->all() : []));
@endphp

<script>
(function () {
    const fieldTypes = @json($fieldTypes);
    const showOnOptions = @json($showOnOptions);
    const wrapper = document.getElementById('fields-wrapper');
    const addBtn = document.getElementById('add-field-btn');
    let index = 0;

    function esc(s) { return String(s ?? '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;'); }

    function fieldCard(i, data) {
        data = data || {};
        const typeOpts = Object.entries(fieldTypes).map(([k, v]) =>
            `<option value="${k}" ${data.type === k ? 'selected' : ''}>${v}</option>`).join('');
        const showOpts = Object.entries(showOnOptions).map(([k, v]) =>
            `<option value="${k}" ${(data.show_on || 'both') === k ? 'selected' : ''}>${v}</option>`).join('');
        const isSelect = data.type === 'select';
        return `
        <div class="border rounded p-3 bg-light field-card" data-index="${i}">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <strong>Field #<span class="field-num">${i + 1}</span></strong>
                <button type="button" class="btn btn-danger btn-sm remove-field">Remove</button>
            </div>
            ${data.id ? `<input type="hidden" name="fields[${i}][id]" value="${data.id}">` : ''}
            <div class="row g-2">
                <div class="col-md-6">
                    <label class="form-label">Label *</label>
                    <input type="text" name="fields[${i}][label]" class="form-control form-control-sm" required maxlength="100"
                        value="${esc(data.label)}" placeholder="e.g. Wallet Address">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Type *</label>
                    <select name="fields[${i}][type]" class="form-select form-select-sm field-type">${typeOpts}</select>
                </div>
                <div class="col-12 field-options" style="${isSelect ? '' : 'display:none;'}">
                    <label class="form-label">Options * (one per line or comma-separated)</label>
                    <textarea name="fields[${i}][options_text]" class="form-control form-control-sm" rows="2"
                        placeholder="TRC20&#10;ERC20&#10;BEP20">${esc(data.options_text)}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Placeholder</label>
                    <input type="text" name="fields[${i}][placeholder]" class="form-control form-control-sm" value="${esc(data.placeholder)}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Show for</label>
                    <select name="fields[${i}][show_on]" class="form-select form-select-sm">${showOpts}</select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="fields[${i}][sort_order]" class="form-control form-control-sm" min="0" value="${esc(data.sort_order ?? (i + 1))}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[${i}][is_required]" value="1" ${data.is_required ? 'checked' : ''}>
                        <label class="form-check-label small">Required</label>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[${i}][is_active]" value="1" ${data.is_active === false || data.is_active === 0 ? '' : 'checked'}>
                        <label class="form-check-label small">Enabled</label>
                    </div>
                </div>
            </div>
        </div>`;
    }

    function renumber() {
        wrapper.querySelectorAll('.field-num').forEach((el, n) => el.textContent = n + 1);
    }

    function bindTypeToggles(scope) {
        scope.querySelectorAll('.field-type').forEach(sel => {
            sel.addEventListener('change', () => {
                const card = sel.closest('.field-card');
                card.querySelector('.field-options').style.display = sel.value === 'select' ? '' : 'none';
            });
        });
    }

    function addField(data) {
        const div = document.createElement('div');
        div.innerHTML = fieldCard(index++, data);
        const card = div.firstElementChild;
        wrapper.appendChild(card);
        bindTypeToggles(card);
        card.querySelector('.remove-field').addEventListener('click', () => { card.remove(); renumber(); });
        renumber();
    }

    addBtn.addEventListener('click', () => addField({ type: 'text', show_on: 'both', is_required: true, is_active: true }));
    (window.__existingFields || @json($existingFields)).forEach(f => addField(f));
})();
</script>
@endsection
