@extends('layouts.app')

@section('title', 'Nuevo congreso')

@section('content')
<div class="container py-4">
    <h1 class="h4 mb-3 text-body">Nuevo congreso</h1>
    <div class="card border-0 shadow-sm uim-page-shell">
        <div class="card-body p-4">
            <form action="{{ route('admin.congresos.store') }}" method="post" enctype="multipart/form-data">
                @include('admin.congresos._form', ['method' => 'POST'])
            </form>
        </div>
    </div>
</div>
@endsection
