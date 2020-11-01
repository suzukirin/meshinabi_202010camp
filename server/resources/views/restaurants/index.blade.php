@extends('layouts.app')

@section('title','一覧画面')

@section('content')
    
    <ul>
        @foreach ($restaurants as $restaurant)
            <li class="list-unstyled border mb-5 pl-3 shadow">
                {{-- borderで箱を作る mb-5 マージンのレベル --}}
                @include('layouts.restaurant',compact('restaurant'))
            </li>
        @endforeach
    </ul>
     <div class="d-flex justify-content-center">
         {{ $restaurants->links() }}
     </div> 
@endsection
