@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD ContosoUniversity Laravel 8</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Input Siswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">LastName</th>
            <th width="280px"class="text-center">FirstMidName</th>
            <th width="280px"class="text-center">EnrollmentDate</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($students as $siswa)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $siswa->LastName }}</td>
                <td>{{ $siswa->FirstMidName }}</td>
                <td>{{ $siswa->EnrollmentDate }}</td>
                <td class="text-center">
                    <form action="{{ route('students.destroy', $siswa->id) }}" method="POST">

                        <a class="btn btn-info btn-sm" href="{{ route('students.show', $siswa->id) }}">Show</a>

                        <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $siswa->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $students->links() !!}
@endsection
