@props([
    'comment' => null,
    'placeholder' => '',
    'model',
    'autofocus' => false,
])
<textarea
    wire:model="{{ $model }}"
    @if($autofocus) autofocus @endif
    class="comments-textarea"
    placeholder="{{ $placeholder }}"
></textarea>
