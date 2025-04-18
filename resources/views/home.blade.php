@extends('layouts.app')

@section('nav')
<div>
    This is navigation patrt
</div>
@endsection
@section('body')

<div>

    @php
    $user="user";


    @endphp

    @if ($user == "admin")
    <div>
        THis is admin part
    </div>

    @else
    <div>
        THis is User part
    </div>
    @endif

    This is home page


    @foreach ($items as $item )

    <div>
        {{-- {{$item['name']}} --}}

        <x-item-view   :head="$item['name']" :category="$item['type']" />
    </div>
    @endforeach
</div>

@endsection