@extends('layouts.app')

@section('content')
<div class="px-4">
   <create-Status id="{{Auth::user()->id}}"></create-Status>
</div>
@endsection
