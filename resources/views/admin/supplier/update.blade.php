@extends('layouts.app')

@section('title', $title)

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('dashboard.supplier.index') }}">Supplier</a></div>
                <div class="breadcrumb-item">{{ $title }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.supplier.update', $supplier) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.supplier.form')
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection