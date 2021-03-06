@extends('layouts.app')
@section('title', "| Find friends")

@section('content')

<div class="row">

    @include('layouts.left-sidebar')

    <div class="col-lg-9 order-lg-2 col-md-12 order-3 text-center feature-item rounded py-3 px-1">
        <div class="shadow p-2">
            @if(!$allFriends->count())
                <h5>Website has no users!</h5>
            @else
                @foreach($allFriends as $friend)
                    @include('layouts.user-profile-small', ['user' => $friend, 'delete' => false, 'gallery' => false])
                @endforeach
            @endif
        </div>
    </div>

</div>

@endsection
