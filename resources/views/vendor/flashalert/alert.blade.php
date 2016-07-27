@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@append

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

@if(session()->has('flashalert'))
<script>
swal({
    title: "{{session('flashalert.title')}}",
    text: "{{session('flashalert.message')}}",
    type: "{{session('flashalert.level')}}",
    timer: "{{config('flashalert.hide_timer')}}",
    showConfirmButton: "{{config('flashalert.show_confirmation_button')}}"
});
</script>
{{session()->forget('flashalert')}}
@endif

@append
