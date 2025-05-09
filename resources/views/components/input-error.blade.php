@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'invalid-feedback d-block']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}@if(!$loop->last)<br>@endif
        @endforeach
    </div>
@endif
