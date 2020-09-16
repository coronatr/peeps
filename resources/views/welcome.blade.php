@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    People Phonebook
                </div>
                @if(session('$name'))
                    <p style="background:forestgreen; color:#fff; padding: 20px;display: block;width: 100%;font-size: 25px;">{{ session('$name') }} added successfully</p>
                @endif
                <a href="{{ route('people.addnew') }}">Add person to People</a><br>
                <a href="{{ route('people.list') }}">List People</a>
            </div>
        </div>
@endsection
