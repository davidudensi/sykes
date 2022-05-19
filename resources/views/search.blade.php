@extends('layout')
@section('title', 'Search Data')
@section('content')

<div class="main-body">
    <div class="search">
        <form action="/search" method="post">
            <input type="text" name="keyword" placeholder="Search Properties" />
            <button type='submit'>Search Now</button><br>
            <span>Pets</span>
            <select name="pets" id="pets" class="enum-choice">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>

            <span>Near beach</span>
            <select name="beach" id="beach" class="enum-choice">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>

            <input type="number" name="sleeps" id="sleeps" placeholder="Sleeps">
            <input type="number" name="beds" id="beds" placeholder="Beds">
            <input type="date" name="avail" id="avail">
            {{ csrf_field() }} <br>
        </form>
    </div>

    <h1>Properties</h1>
    <hr>
    <div class="search-result">
        @if(@count($locations) == 0)
            <span>Empty result</span>
        @else
            @foreach($locations as $location)
                <div class="main-outer">
                    <div class="inner-1">
                        <span id="location">{{ $location->property_name }}</span><br>
                        <span id="property">| {{ $location->location_name }} |</span><br><br>
                        <span id="available">
                            @if($location->start_date === null)
                                Not available
                            @else
                                {{ $location->start_date }} - {{ $location->end_date }}
                            @endif
                        </span>
                    </div>
                    <div class="inner-2">
                        <span>
                            @if($location->near_beach === 1)
                                <span class="positive">Near the beach</span>
                            @else
                                <span class="negative">Far from the beach</span>
                            @endif
                        </span><br>
                        <span>
                            @if($location->near_beach === 1)
                                <span class="positive">Accepts pets</span>
                            @else
                                <span class="negative">No pets</span>
                            @endif
                        </span><br>
                        <span>
                            <strong>Sleeps:</strong>
                            {{ $location->sleeps }}
                        </span><br>
                        <span>
                            <strong>Beds:</strong>
                            {{ $location->beds }}
                        </span><br>
                    </div>
                </div>
                <hr>
            @endforeach
        @endif

        {{ $locations->links() }}
    </div>

    @endsection

</div>