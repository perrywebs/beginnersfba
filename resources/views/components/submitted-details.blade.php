{{-- Renders submitted custom payment info from details + method_snapshot. Falls back to legacy columns. --}}
@php
    $details = $details ?? [];
    $snapshot = $snapshot ?? [];
    $snapshotFields = collect($snapshot['fields'] ?? []);
    $labels = $snapshotFields->pluck('label', 'name');
@endphp
@if (! empty($details))
    <dl class="row small mb-0">
        @foreach ($details as $key => $value)
            <dt class="col-sm-5">{{ $labels[$key] ?? ucfirst(str_replace('_', ' ', $key)) }}</dt>
            <dd class="col-sm-7">{{ is_array($value) ? implode(', ', $value) : $value }}</dd>
        @endforeach
    </dl>
    @if (! empty($snapshot['method_name']))
        <p class="small text-muted mt-2 mb-0">
            Submitted via {{ $snapshot['method_name'] }}
            @if (! empty($snapshot['method_type_label']))({{ $snapshot['method_type_label'] }})@endif
            — original configuration preserved.
        </p>
    @endif
@elseif(! empty($legacy))
    <dl class="row small mb-0">
        @foreach ($legacy as $label => $value)
            @if ($value !== null && $value !== '')
                <dt class="col-sm-5">{{ $label }}</dt>
                <dd class="col-sm-7">{{ $value }}</dd>
            @endif
        @endforeach
    </dl>
@else
    <span class="text-muted small">No additional details.</span>
@endif
