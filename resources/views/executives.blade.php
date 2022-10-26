@extends('layouts.app')

@section('content')
<div class="px-4">
<table>
      <tr class="bg-indigo-100">
        <td>Name</td>
        <td>Email</td>
      </tr>
      @foreach($executives as $executive)
      <tr>
        <td>{{ $executive->name }}</td>
        <td>{{ $executive->email }}</td>
      </tr>
      @endforeach
    </table>
</div>
@endsection
