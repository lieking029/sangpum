@extends('layouts.app')

@section('content')

<style>
.nav-pills .nav-link {
  cursor: pointer;
}

.nav-pills .nav-link.active {
  background-color: #004AAD;
  color: white;
}

.nav-pills .nav-link:not(.active) {
  background-color: #e9ecef;
  color: #495057;
}


</style>

<div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <!-- Stepper indicators -->
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="step1-tab" data-bs-toggle="pill" data-bs-target="#step1" type="button" role="tab" aria-controls="step1" aria-selected="true">Step 1</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="step2-tab" data-bs-toggle="pill" data-bs-target="#step2" type="button" role="tab" aria-controls="step2" aria-selected="false">Step 2</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="step3-tab" data-bs-toggle="pill" data-bs-target="#step3" type="button" role="tab" aria-controls="step3" aria-selected="false">Step 3</button>
          </li>
        </ul>
        <!-- Stepper content -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
            <p>Content for Step 1...</p>
            <button class="btn btn-primary next-btn" type="button" data-next="step2-tab">Next</button>
          </div>
          <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
            <p>Content for Step 2...</p>
            <button class="btn btn-primary next-btn" type="button" data-next="step3-tab">Next</button>
          </div>
          <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
            <p>Content for Step 3...</p>
            <!-- Add more steps if needed -->
          </div>
        </div>
      </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
  // Add click event on all 'Next' buttons
  document.querySelectorAll('.next-btn').forEach(button => {
    button.addEventListener('click', (e) => {
      const nextId = e.target.getAttribute('data-next');
      const nextTab = document.querySelector(`#${nextId}`);
      new bootstrap.Tab(nextTab).show(); // Activate the next tab using Bootstrap's Tab plugin
    });
  });
});
    </script>
  </div>

@endsection
