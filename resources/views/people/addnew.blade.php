@extends('layouts.app')
@section('content')
    <h1 class="add-h1">Add new person</h1>
    <form action="{{ route('people.save') }}" method="POST" class="add-form">
        @csrf
        <input type="hidden" value="{{Auth::user()->name}}" name="addedBy">
        <input type="text" name="name" class="text" placeholder="Enter name"><br>
        <input type="text" name="number" class="text" placeholder="Enter number"><br>
        <input type="submit" value="Submit">
    </form>
@endsection
