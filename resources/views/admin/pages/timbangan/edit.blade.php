@extends('layouts.admin.app')

@section('content')
<style>
    /* Styling Dasar Form dan Kontrol */
    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #dcdcdc;
        background-color: #f7fff9;
        /* Latar belakang input sedikit kehijauan */
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #0b57d0;
        /* Biru terang untuk fokus */
        background-color: #ffffff;
        /* Putih saat fokus */
        box-shadow: 0 0 0 0.25rem rgba(11, 87, 208, 0.25);
    }

    .card-form {
        background: #ffffff;
        border: none;
        border-top: 6px solid #0b57d0;
        /* Garis biru di atas lebih tebal */
        border-radius: 12px;
        transition: box-shadow 0.3s ease;
    }

    .card-form:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        /* Shadow lebih kuat saat hover */
        transform: translateY(-2px);
    }

    .form-title {
        color: #0b57d0;
        font-weight: 800;
        /* Lebih tebal */
        font-size: 1.8rem;
        /* Ukuran lebih besar */
        padding-bottom: 10px;
        border-bottom: 3px solid #0b57d0;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
    }

    .form-title i {
        margin-right: 15px;
        color: #0b57d0;
    }

    /* Pembatas Antar Input (Optional Divider Style) */
    .input-divider {
        margin-top: 20px;
        margin-bottom: 20px;
        border-bottom: 1px dashed #e0e0e0;
    }

    /* Styling untuk tombol Update (Submit) */
    .btn-update {
        background: linear-gradient(90deg, #0b57d0, #0a4ac8);
        /* Gradient Biru */
        border: none;
        color: white;
        font-weight: 700;
        padding: 12px 35px;
        border-radius: 10px;
        transition: all 0.3s;
        box-shadow: 0 4px 10px rgba(11, 87, 208, 0.4);
    }

    .btn-update:hover {
        background: linear-gradient(90deg, #0a4ac8, #0a3d99);
        transform: translateY(-2px);
        /* Efek lift */
        box-shadow: 0 6px 15px rgba(11, 87, 208, 0.5);
    }

    /* Styling untuk tombol Kembali (Secondary) */
    .btn-secondary {
        font-weight: 600;
        border-radius: 10px;
        padding: 12px 35px;
        transition: all 0.3s;
        border: 1px solid #ccc;
    }

    .btn-secondary:hover {
        background-color: #f1f1f1;
    }

    /* Styling untuk field readonly */
    .readonly-field {
        background-color: #e6eef5 !important;
        /* Warna biru muda untuk readonly */
        border: 1px dashed #a8c0d8 !important;
        color: #4a5568;
        font-style: italic;
    }
</style>

<div class="container mt-4">

    {{-- Judul Besar dengan Ikon dan Teks Diperbesar --}}
    <h3 class="form-title">
        <i class="fas fa-edit"></i> Edit Data Timbangan
    </h3>

    <div class="card shadow p-5 mt-3 card-form">

        {{-- Menampilkan pesan error validasi --}}
        @if ($errors->any())
        <div class="alert alert-danger mb-4" role="alert" style="border-left: 4px solid #d93025; background-color: #f8d7da; border-radius: 8px;">
            <h5 class="alert-heading text-danger font-weight-bold">
                <i class="fas fa-exclamation-triangle me-2"></i> Gagal Memperbarui Data!
            </h5>
            <p>Silakan periksa kembali inputan Anda:</p>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.datatimbangan.update', $timbangan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Field Kode Transaksi (Readonly) --}}
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label font-weight-bold text-muted">Kode Transaksi</label>
                        <input type="text" name="kode_transaksi"
                            class="form-control readonly-field"
                            value="{{ $timbangan->kode_transaksi }}"
                            readonly>
                    </div>
                </div>
                {{-- Field Tanggal --}}
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="tanggal" class="form-label font-weight-bold">Tanggal Penimbangan <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', $timbangan->tanggal) }}"
                            required>
                        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- Pembatas Visual --}}
            <div class="input-divider"></div>

            {{-- Field Nama Petani --}}
            <div class="mb-4">
                <label for="nama_petani" class="form-label font-weight-bold">Nama Petani <span class="text-danger">*</span></label>
                <input type="text" name="nama_petani" id="nama_petani"
                    class="form-control @error('nama_petani') is-invalid @enderror"
                    value="{{ old('nama_petani', $timbangan->nama_petani) }}"
                    placeholder="Masukkan nama lengkap petani"
                    required>
                @error('nama_petani') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Pembatas Visual --}}
            <div class="input-divider"></div>

            {{-- Field Total TBS --}}
            <div class="mb-4">
                <label for="total_tbs" class="form-label font-weight-bold">Total TBS (Kg) <span class="text-danger">*</span></label>
                <input type="number" name="total_tbs" id="total_tbs"
                    class="form-control @error('total_tbs') is-invalid @enderror"
                    value="{{ old('total_tbs', $timbangan->total_tbs) }}"
                    placeholder="Masukkan total berat TBS dalam kilogram (minimum 1 Kg)"
                    min="1" required>
                @error('total_tbs') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Pembatas Visual --}}
            <div class="input-divider"></div>

            {{-- Field Status --}}
            <div class="mb-4">
                <label for="status" class="form-label font-weight-bold">Status <span class="text-danger">*</span></label>
                <select name="status" id="status"
                    class="form-control @error('status') is-invalid @enderror"
                    required>
                    <option value="Menunggu" {{ old('status', $timbangan->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Terkonfirmasi" {{ old('status', $timbangan->status) == 'Terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                </select>
                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>


            <div class="mt-5 pt-3 border-top d-flex justify-content-end">
                <a href="{{ route('admin.datatimbangan.index') }}" class="btn btn-secondary me-3">
                    <i class="fas fa-arrow-left me-1"></i> Batal / Kembali
                </a>
                <button type="submit" class="btn btn-update">
                    <i class="fas fa-check-circle me-1"></i> Update Data
                </button>
            </div>

        </form>

    </div>

</div>
@endsection