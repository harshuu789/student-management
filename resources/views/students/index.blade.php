@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Students List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-2">Add Student</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Class Teacher</th>
                <th>Yearly Fees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->teacher->name }}</td>
                <td>{{ $student->yearly_fees }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between align-items-center">
        <div>
            Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} students.
        </div>
        <div>
            {{ $students->links('pagination::bootstrap-4') }} <!-- Use Bootstrap pagination -->
        </div>
    </div>
</div>
@endsection
<script>
    $(document).ready( function () {
        $('.table').DataTable();
    });
</script>
