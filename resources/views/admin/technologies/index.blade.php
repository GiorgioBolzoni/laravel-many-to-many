@extends('layouts.app')

@section('content')
    <section class="container">
        <h1 class="">Technologies Dashboard</h1>
        <div class="text-center p-2">
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-success">Add Technology</a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="d-flex flex-column">
            <div class="d-flex justify-content-center w-100 mb-2">
                <form action="{{ route('admin.technologies.index') }}" method="GET" class="w-100">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="search" placeholder="Search by title" aria-label="Search"
                            class="form-control">
                        <button type="submit" class="btn btn-primary text-uppercase fw-bold">Search</button>
                    </div>
                </form>
            </div>
            <div>
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.technologies.show', $technology->slug) }}">
                                        {{ $technology->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.technologies.edit', $technology->slug) }}"
                                        class="link-secondary">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.technologies.destroy', $technology->slug) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button btn btn-danger ms-3"
                                            data-item-title="{{ $technology->name }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No technologies</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @include ('partials.modal-delete')
@endsection
