@extends('layouts.app')
@section('content')
    @if(session('$name'))
        <p style="background:forestgreen; color:#fff; padding: 20px;display: block;width: 100%;font-size: 25px;">{{ session('$name') }} deleted successfully</p>
    @endif
    @if(Auth::user()->isAdmin)
        <p style="background: forestgreen;color: white;width: 100%;font-size: 25px;text-align: center;padding: 50px;">Welcome, master.</p>
        @if($result!="[]")
        <ul style="text-align: center;list-style-type: none">
        @foreach($result as $data)
            <li>Name : {{ $data->name }}</li>
            <li>Number : {{ $data->number }}</li>
            <li>AddedBy : {{ $data->addedBy }}</li>
                <form action="/removePeep/{{ $data->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="margin: 30px;width: 30%;">Delete this record</button>
                </form>
                <hr style="width: 500px;">
        @endforeach
        </ul>
        @else
            <p style="background:red;color: white;padding: 20px;font-weight:bold;">No number record found on database</p>
        @endif
    @else
        <ul style="text-align: center;list-style-type: none">
            @if($restricted=="[]")
                <p style="background:darksalmon; color:#fff; padding: 20px;display: block;width: 100%;font-size: 25px;">There is no peep in your list.
                    <br>You have no friends
                    <br>Now go cry in the bathroom
                    <br>Fucking weirdo
                </p>
            @else
            @foreach($restricted as $data)
                <li>Name : {{ $data->name }}</li>
                <li>Number : {{ $data->number }}</li>
                <li>AddedBy : {{ $data->addedBy }}</li>
                    <form action="/removePeep/{{ $data->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="margin: 30px;width: 30%;">Delete this record</button>
                    </form>
                <hr style="width: 500px;">
            @endforeach
            @endif
        </ul>
    @endif
@endsection
