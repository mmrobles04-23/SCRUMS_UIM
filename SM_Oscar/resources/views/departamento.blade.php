@extends('layouts.app')

@section('title', $deptoActivo->nombre . ' - UIMA FES Acatlán')

@push('styles')
  @vite(['resources/css/departamentos.css', 'resources/js/departamentos.js'])
@endpush

@section('content')
  <div class="w-100 bg-surface-container-lowest"
    style="--depto-color: {{ $deptoActivo->color }}; --depto-color-alpha: {{ $deptoActivo->color }}25;">

    <div class="d-flex w-100">
      {{-- Sidebar de Departamentos (Desktop) --}}
      @include('departamentos.sidebar')

      {{-- Menú Offcanvas para móvil --}}
      @include('departamentos.mobile-sidebar')

      {{-- Contenido Principal --}}
      <div class="flex-grow-1 overflow-x-hidden">
        {{-- Hero Banner --}}
        @include('departamentos.hero')

        {{-- Objetivo, Perfil y Funciones --}}
        @include('departamentos.objetivo')

        {{-- Proyectos Destacados --}}
        @include('departamentos.proyectos')
      </div>
    </div>

  </div>
@endsection