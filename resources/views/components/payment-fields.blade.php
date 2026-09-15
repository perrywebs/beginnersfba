{{-- Renders dynamic payment-method fields. Expects $fields (PaymentMethodField collection) and optional $values array. --}}
@php($values = $values ?? [])
@foreach ($fields as $field)
    <div class="col-12 mb-3">
        <label class="form-label" for="field-{{ $field->name }}">
            {{ $field->label }}
            @if ($field->is_required)<span class="text-danger">*</span>@endif
        </label>

        @if ($field->type === 'textarea')
            <textarea name="fields[{{ $field->name }}]" id="field-{{ $field->name }}" class="form-control"
                rows="3" placeholder="{{ $field->placeholder }}">{{ old('fields.'.$field->name, $values[$field->name] ?? '') }}</textarea>
        @elseif($field->type === 'select')
            <select name="fields[{{ $field->name }}]" id="field-{{ $field->name }}" class="form-select">
                <option value="">-- Select {{ $field->label }} --</option>
                @foreach ($field->options_list as $option)
                    <option value="{{ $option }}" @selected(old('fields.'.$field->name, $values[$field->name] ?? '') == $option)>{{ $option }}</option>
                @endforeach
            </select>
        @else
            <input type="{{ $field->type === 'tel' ? 'tel' : $field->type }}" name="fields[{{ $field->name }}]"
                id="field-{{ $field->name }}" class="form-control"
                value="{{ $field->type === 'password' ? '' : old('fields.'.$field->name, $values[$field->name] ?? '') }}"
                placeholder="{{ $field->placeholder }}">
        @endif

        @if ($field->help_text)
            <small class="form-text text-muted">{{ $field->help_text }}</small>
        @endif
        @error('fields.'.$field->name)
            <em class="text-danger d-block">{{ $message }}</em>
        @enderror
    </div>
@endforeach
