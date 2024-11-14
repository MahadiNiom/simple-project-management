@extends('project.new-app')
@section('title', 'Projects')

@section('content')
    <div class="col-lg-8 m-auto mt-3">
        <div class="card">
            <div class="card-header">
                <h2>Create Project</h2>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif
               <form action="{{ route('project.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Project Title</label>
                    <input type="text" name="project_title" class="form-control" id="" placeholder="Project title">
                    @error('project_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Description here" id="" rows="3"></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="" placeholder="Price">
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="status" class="form-control" id="">
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
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
