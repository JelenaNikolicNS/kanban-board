@extends('../head')

@section('content')
    <h2>Adding State</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{url('state')}}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>
                    <label for="Name">Name:</label>
                </td>
                <td>
                    <input type="text" class="form-control" name="name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Number">Limit card number(max 99):</label>
                </td>
                <td>
                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control" name="limit" maxlength="2">
                </td>
            </tr>
            <tr>
                <td>
                    <br />
                    <button type="submit" class="btn btn-success">Submit</button>
                </td>
            </tr>
        </table>
    </form>
@endsection