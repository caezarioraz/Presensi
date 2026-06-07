@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="fw-bold mb-0">
    Data Admin
</h2>

<a href="/admin/create"
   class="btn btn-primary">

    <i class="bi bi-plus-circle"></i>
    Tambah Admin

</a>


</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card border-0 shadow-sm">

<div class="card-body">

    <table class="table table-hover align-middle">

        <thead>

            <tr>
                <th>ID</th>
                <th>Username</th>
            </tr>

        </thead>

        <tbody>

            @forelse($admins as $admin)

            <tr>

                <td>{{ $admin->id }}</td>

                <td>{{ $admin->username }}</td>

            </tr>

            @empty

            <tr>

                <td colspan="2" class="text-center">
                    Belum ada data admin
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

</div>

@endsection
