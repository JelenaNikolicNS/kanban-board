@extends('head')

@section('content')
    <h2>Edit State {{ $state['name'] }}</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{action('StateController@update', $state['id'])}}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>
                    <label for="Name">Name:</label>
                </td>
                <td>
                    <input type="text" class="form-control" name="name" value="{{ $state['name'] }}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Number">Limit (max 99):</label>
                </td>
                <td>
                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control" name="limit" maxlength="2" value="@if($state['limit'] !== '0'){{$state['limit']}}@endif">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-success">Update</button>
                </td>
                <td> <a class="delete" href="../delete/{{$state['id']}}">Delete</a></td>
            </tr>
        </table>
    </form>
@endsection