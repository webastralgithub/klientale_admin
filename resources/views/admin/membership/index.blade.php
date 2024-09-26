@extends('admin.layouts.app')

@section('content')

<div class="mx-4 content-p-mobile">
    <div class="page-header-tp">
        <h3>Manage Membership</h3>
        <form>
            <input type="search" class="form-control" placeholder="Find Membership" name="q" value="">
        </form>
        <div class="top-bntspg-hdr">
            @can('create-user')
            <a href="{{route('membership.create')}}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Membership</a>
            @endcan
        </div>
    </div>
    @if(\Session::has('error'))
    <div>
        <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
    </div>
    @endif

    @if(\Session::has('success'))
    <div>
        <li class="alert alert-success">{!! \Session::get('success') !!}</li>
    </div>
    @endif
    <div class="content-body">

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Caterory</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($memberships as $membership)
                <tr>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden cogs-btn"><i class="fa fa-cog" aria-hidden="true"></i></span>
                            </button>
                            <ul class="dropdown-menu">
                                <form action="{{ route('membership.destroy', $membership->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <li><a href="{{ route('membership.edit', $membership->id) }}" class="dropdown-item">Edit</a></li>
                                    <li><button type="submit" class="dropdown-item" onclick="return confirm('Do you want to delete this membership?');">Delete</button></li>
                                </form>
                            </ul>
                        </div>
                    </td>
                    <td> <a href=""></a>{{($membership->category) ? $membership->category->name: ''}}</td>
                    <td>{{isset($membership->name) ?  $membership->name : ''}}</td>
                    <td>{{isset($membership->description) ?  $membership->description : ''}}</td>
                    <td>{{isset($membership->price) ?  $membership->price : ''}}</td>
                </tr>
                @empty
                <td colspan="5">
                    <center><span class="text-danger">
                        <strong>No Memberships Found!</strong>
                    </span></center>
                </td>
                @endforelse
            </tbody>
        </table>

        {{ $memberships->links() }}


    </div>
</div>

@endsection