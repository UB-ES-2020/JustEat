@extends('layouts.app')

@section('header')
<vue-header>
</vue-header>
@endsection

@section('content')
<order-information :id="{{$id}}">
</order-information>
@endsection

@section('footer')
<vue-footer>
</vue-footer>
@endsection