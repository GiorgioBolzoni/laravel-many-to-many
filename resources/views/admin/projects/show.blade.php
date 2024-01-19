@extends('layouts.app')
@section('content')
    <section class="container my-3" id="item-project">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-column w-100 text-center">
                <h1>{{ $project->title }}</h1>
                <p><a id="link" href="{{ $project->link }}">{{ $project->link }}</a></p>
            </div>

            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-success px-3">Edit</a>
        </div>
        <div class="card p-3 d-flex align-items-center">
            <p class="py-3 text-center text-wrap">{!! $project->body !!}</p>
            <div class="d-flex justify-content-center">
                @if ($project->type_id)
                    <div class="mb-3 me-5 text-center">
                        <h4>Type</h4>
                        <a class="badge text-bg-primary"
                            href="{{ route('admin.types.show', $project->type->slug) }}">{{ $project->type->name }}</a>
                    </div>
                @endif

                @if (count($project->technologies) > 0)
                    <div class="mb-3 ms-5 text-center">
                        <h4>Technologies</h4>
                        @foreach ($project->technologies as $technology)
                            <a class="badge rounded-pill text-bg-success"
                                href="{{ route('admin.technologies.show', $technology->slug) }}">{{ $technology->name }}</a>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="card-img">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
            </div>
    </section>
@endsection
