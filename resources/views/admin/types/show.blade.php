@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{ $type->name }}</h1>
        <h3>Project List</h3>
        <div class="card">
            <ul class="list-group list-group-flush">
                @forelse ($type->projects as $project)
                    <li class="list-group-item py-5 fw-semibold">
                        <a href="{{ route('admin.projects.show', $project->slug) }}"
                            class="link-underline link-underline-opacity-0"> {{ $project->title }}</a>

                    </li>
                @empty
                    <li class="list-group-item text-center py-5 text-uppercase fs-5 fw-bold">No projects</li>
                @endforelse

            </ul>
        </div>
    </section>
@endsection
