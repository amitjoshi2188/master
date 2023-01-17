@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Route Listing') }}</div>

                <div class="card-body">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Route Information</h2>
                                </div>
                                <div class="pull-right mb-2">
                                    <a class="btn btn-success" href="{{ route('routes.create') }}"> Add Route</a>
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
                                    <th>Route Name</th>
                                    <th>Bus Number</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($routes as $route)
                                <tr>
                                    <td>{{ $route->id }}</td>
                                    <td>{{ $route->name }}</td>
                                    <td>{{ $route->bus->name }}</td>
                                    <td>
                                        <form action="{{ route('routes.destroy',$route->id) }}" method="Post">
                                            <a class="btn btn-primary" href="{{ route('routes.edit',$route->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $routes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection