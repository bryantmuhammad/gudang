@extends('layouts.app')

@section('title', $title)

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('dashboard.user.index') }}">Bootstrap Components</a>
                </div>
                <div class="breadcrumb-item">Tambah User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.user.store') }}" method="POST">
                        @csrf
                        @include('admin.user.form')
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection