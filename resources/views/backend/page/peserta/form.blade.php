@extends ('backend/layout.app')

@section ('content')
<div class="card">
    <div class="card-header">
        
    </div>
    <div class="card-body">
        <form action="{{ route($url, $peserta->peserta_id ?? null) }}" method="POST" enctype="multipart/form-data">            
            @csrf
            @if(isset($peserta))
            @method('put')
            @endif
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Peserta</label>
                <div class="col-sm-10">                
                    <input type="text" class="form-control @error('peserta_nama') {{ 'is-invalid' }} @enderror" 
                    name="peserta_nama" value="{{ old('peserta_nama') ?? $peserta->peserta_nama ?? '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email Peserta</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control @error('peserta_email') {{ 'is-invalid' }} @enderror"" name="peserta_email" value="{{ old('peserta_email') ?? $peserta->peserta_email ?? '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nilai X</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('peserta_nilai_x') {{ 'is-invalid' }} @enderror"" name="peserta_nilai_x" value="{{ old('peserta_nilai_x') ?? $peserta->peserta_nilai_x ?? '' }}" max="33">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nilai Y</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('peserta_nilai_y') {{ 'is-invalid' }} @enderror"" name="peserta_nilai_y"
                    value="{{ old('peserta_nilai_y') ?? $peserta->peserta_nilai_y ?? '' }}" max="23">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nilai Z</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('peserta_nilai_z') {{ 'is-invalid' }} @enderror"" name="peserta_nilai_z"
                    value="{{ old('peserta_nilai_z') ?? $peserta->peserta_nilai_z ?? '' }}" max="18">                
                </div>
            </div><div class="form-group row">
                <label class="col-sm-2 col-form-label">Nilai W</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('peserta_nilai_w') {{ 'is-invalid' }} @enderror"" name="peserta_nilai_w"
                    value="{{ old('peserta_nilai_w') ?? $peserta->peserta_nilai_w ?? '' }}" max="13">
                </div>
            </div> 
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            <button class="btn btn-warning" type="button" onclick="window.history.back()">Back</button>           
        </form>
    </div>
</div>
@endsection