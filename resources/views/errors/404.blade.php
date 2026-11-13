@extends('layouts.app')

@section('title', 'Halaman tidak ditemukan — Vina Nuraini')
@section('robots', 'noindex')

@section('content')
  <section class="error-page" aria-labelledby="error-title">
    <div class="container">
      <p class="error-code">404 <span aria-hidden="true">/</span> Tidak ditemukan</p>
      <h1 class="error-title" id="error-title">Halaman ini<em>tidak ada.</em></h1>
      <p class="error-desc">
        Alamat yang Anda tuju mungkin salah ketik atau sudah dipindahkan. Silakan kembali
        ke beranda untuk melanjutkan.
      </p>
      <div class="error-actions">
        <a class="btn btn-primary" href="{{ url('/') }}">
          Kembali ke Beranda
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
            <path d="M2 8h11M9 3.5 13.5 8 9 12.5" stroke="currentColor" stroke-width="1.4"/>
          </svg>
        </a>
      </div>
    </div>
  </section>
@endsection
