@extends('layouts.private')
@section('content')

<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
    .card-text {
        min-height: 48px;
    }
</style>

  <h1 class="mt-3 mb-3">Welcome, {{ $user->forename }} {{ $user->surname }}</h1>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm bg-warning">
                <img class="card-img-top" alt="Classes" src="https://placehold.co/600x400?text=Classes" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">See which students are in your class each day of the week</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{ route('classes.index') }}" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" alt="Full Student List" src="https://placehold.co/600x400?text=Students" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">See all registered students and their information</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" alt="Classrooms" src="https://placehold.co/600x400?text=Classrooms" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">View availability on classrooms and facilities.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" alt="Subjects" src="https://placehold.co/600x400?text=Subjects" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">List all subjects.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" alt="Grades" src="https://placehold.co/600x400?text=Grades" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">View all grades for all students.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" alt="Assessments" src="https://placehold.co/600x400?text=Assessments" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">View results of all assessments.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" alt="Achievements" src="https://placehold.co/600x400?text=Achievements" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">View all achievements.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" alt="Detentions" src="https://placehold.co/600x400?text=Detentions" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">View student discipline.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" alt="Staff" src="https://placehold.co/600x400?text=Staff" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">View all staff members.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@stop
