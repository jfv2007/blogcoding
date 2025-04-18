@props(['id','error'])

<input {{ $attributes }} type="text" class="form-control datetimepicker-input
@error($error) is-invalid @enderror" id="{{ $id }}"  data-toggle="datetimepicker"
data-target="#{{ $id }}"
onchange="this.dispatchEvent(new InputEvent('input'))"
/>


{{-- @push('before-livewire-scripts') --}}
@push('js')
<script type="text/javascript">
    $('#{{ $id }}').datetimepicker({
          /* format: 'L',  */
       /*  format: 'dd/mm/yyyy',
        language: 'es',
        autoclose: true, */
    });
</script>
@endpush
