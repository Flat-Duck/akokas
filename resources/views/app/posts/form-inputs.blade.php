@php $editing = isset($post) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.textarea name="body" label="Body" maxlength="255" required
        >{{ old('body', ($editing ? $post->body : '')) }}</x-inputs.textarea
    >
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.select name="user_id" label="User" required>
        @php $selected = old('user_id', ($editing ? $post->user_id : '')) @endphp
        <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
        @foreach($users as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
        @endforeach
    </x-inputs.select>
</x-inputs.group>
