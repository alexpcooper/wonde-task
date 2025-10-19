@extends('layouts.private')
@section('header_files')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.min.js" integrity="sha512-nKXmKvJyiGQy343jatQlzDprflyB5c+tKCzGP3Uq67v+lmzfnZUi/ZT+fc6ITZfSC5HhaBKUIvr/nTLCV+7F+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop
@section('content')

<h2 class="mt-3 mb-3">Classes for {{ $user->forename }} {{ $user->surname }}</h2>

@if (empty($classes))
    <div class="alert alert-danger" role="alert">
        No classes found.
    </div>
@else

<div class="accordion" id="accordionExample">
    @foreach ($classes as $class)
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseClass{{ $class->id }}" aria-expanded="true" aria-controls="collapseClass{{ $class->id }}">
            <span class="border ps-3 pe-3 pt-2 pb-2 me-4 rounded fw-bold">
                <i class="bi bi-people-fill me-1"></i> {{ count($class->students) }}
            </span>
            <span class="ps-3 pe-3 pt-2 pb-2">
                <span class="fw-bold">Class {{ $class->name }}</span>
                <span class="ps-3 pe-3 pt-2 pb-2">
                    Subject: {{ $class->subject }}
                </span>
            </span>
        </button>
        </h2>
        <div id="collapseClass{{ $class->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <p>Class {{ $class->name }}</p>
            <p>Subject: {{ $class->subject }}</p>
            @if ($class->year_group || $class->academic_year)
                <p>Year group: {{ $class->year_group }} ({{ $class->academic_year }})</p>
            @endif
            @if ($class->description != $class->name)
                <p>Description: {{ $class->description }}</p>
            @endif
            <p class="fw-bold">
                Class attendees...
            </p>
            <ol>
                @foreach ($class->students as $student)
                <li aria-student-id="{{ $student->id }}">
                    {{ $student->forename }} {{ $student->surname }}
                </li>
                @endforeach
            </ol>
        </div>
        </div>
    </div>
    @endforeach
</div>

@endif

@stop
