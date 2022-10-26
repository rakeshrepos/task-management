@extends('layouts.app')

@section('content')
<div class="px-4">
   <create-task id="{{Auth::user()->id}}"></create-task>
</div>
@endsection
