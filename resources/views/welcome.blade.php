@extends('head')

@section('content')
    <div>
        <div>
            <button id="add_column"><a href="add_state">Add Column (Card State)</a></button>
            @if(session()->has('success'))
                <div class="alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        @php
            $i = 1;
        @endphp
        @foreach($states as $state )
            @php
            $idAttr = strtolower($state['name']);
            $idAttr = str_replace(' ', '-', $idAttr);
            @endphp
            <div class="container" style="border: 1px solid gray">
                <h2 class="tooltip">
                    <a class="link" href="edit_state/{{$state['id']}}">{{ $state['name'] }}
                        @if ($state['limit'] !== '0')
                            <span id='{{$idAttr}}' class="1 {{$state['limit']}}">({{ $state['limit'] }})</span>
                        @endif
                    </a>
                    <span class="tooltiptext">Click to add/edit column limit</span>
                </h2>
                <hr />
                <ul id='{{$idAttr}}-sortable' class="sortable connectedSortable"></ul>
                @if ($i === 1)
                    <div class="link-div">
                        <input type="text" id="new_text" value=""/>
                        <input type="button" name="btnAddNew" value="Add card" class="add-button"/>
                    </div>
                @endif
            </div>
            @php
                $i++;
            @endphp
        @endforeach
    </div>
@endsection
