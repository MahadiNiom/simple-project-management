{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="">
                        <div class="mb-3">
                            <label for="" class="form-label">Project Title</label>
                            <input type="text" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}




@extends('project.new-app')
@section('title', 'Projects')

@section('content')
    <div class="col-lg-12 m-auto mt-3">
        <div class="card">
            <div class="card-header">
                <h2>Project List</h2>
                @if (session('delete'))
                    <div class="alert alert-success text-center">{{ session('delete') }}</div>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($projects as $sl=> $project)
                      <tr>
                          <td>{{ $sl+1 }}</td>
                          <td>{{ $project->project_title }}</td>
                          <td>{{ $project->description }}</td>
                          <td>{{ $project->price }}</td>
                          <td><span class="badge text-bg-{{ $project->status == 'pending' ? "primary" : "success" }}">{{ $project->status }}</span></td>
                          <td>
                            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('project.destroy', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                          </td>
                      </tr>
                      @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
