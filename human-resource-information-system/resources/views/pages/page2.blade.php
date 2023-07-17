@extends('contoh_layout')

@push('css')
<style>
    h1 {
        color: blue;
    }
</style>
@endpush

@section('content')
<h1>
    INI CONTOH PAGE 2
</h1>
@stop

@push('js')
<script>
    console.log("CONTOH PAGE 2");
</script>
@endpush
