@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Student</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')   <!-- This specifies that the request method is PUT -->

    <div class="mb-3">
        <label for="student_name" class="form-label">Student Name</label>
        <input type="text" name="student_name" class="form-control" value="{{ old('student_name', $student->student_name) }}" required>
    </div>

    <div class="mb-3">
        <label for="class_teacher_id" class="form-label">Class Teacher</label>
        <select name="class_teacher_id" class="form-select" required>
            <option value="">Select Class Teacher</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ $student->class_teacher_id == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="class" class="form-label">Class</label>
        <input type="text" name="class" class="form-control" value="{{ old('class', $student->class) }}" required>
    </div>

    <div class="mb-3">
        <label for="admission_date" class="form-label">Admission Date</label>
        <input type="date" name="admission_date" class="form-control" value="{{ old('admission_date', $student->admission_date) }}" required>
    </div>

    <div class="mb-3">
        <label for="yearly_fees" class="form-label">Yearly Fees</label>
        <input type="number" name="yearly_fees" class="form-control" value="{{ old('yearly_fees', $student->yearly_fees) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Student</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
</form>
</div>
@endsection
