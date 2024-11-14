@extends('project.new-app')
@section('title', 'Projects')

@section('content')
    <div class="col-lg-8 m-auto mt-3">
        <div class="card">
            <div class="card-header">
                <h2>Update Project</h2>
            </div>
            <div class="card-body">
                @if (session('update'))
                    <div class="alert alert-success text-center">{{ session('update') }}</div>
                @endif
               <form action="{{ route('project.update2', $project->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Project Title</label>
                    <input type="text" name="project_title" value="{{ $project->project_title }}" class="form-control" id="" placeholder="Project title">
                    @error('project_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" value="" name="description" id="" rows="3">{{ $project->description }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" value="{{ $project->price }}" name="price" class="form-control" id="" placeholder="Price">
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="status" class="form-control" id="">
                        <option value="pending" {{ $project->status == "pending" ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $project->status == "completed" ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </div>
               </form>
            </div>
        </div>
    </div>

@endsection
