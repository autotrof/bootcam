@extends('contoh_layout')

@push('css')
<style>
    h1 {
        color: red;
    }
</style>
@endpush

@section('content')
<h1>
    INI CONTOH PAGE 1
</h1>
@stop

@push('js')
<script>
    console.log("CONTOH PAGE 1");
</script>
@endpush
