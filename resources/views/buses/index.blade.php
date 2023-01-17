@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bus Listing') }}</div>

                <div class="card-body">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Bus Information</h2>
                                </div>
                                <div class="pull-right mb-2">
                                    <a class="btn btn-success" href="{{ route('buses.create') }}"> Add Bus</a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Bus Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buses as $bus)
                                <tr>
                                    <td>{{ $bus->id }}</td>
                                    <td>{{ $bus->name }}</td>
                                    <td>
                                        <form action="{{ route('buses.destroy',$bus->id) }}" method="Post">
                                            <a class="btn btn-primary" href="{{ route('buses.edit',$bus->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $buses->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection