@extends ('backend/layout.app')

@section ('content')
<div class="card">
  @if(session()->has('message'))
    <div class="alert alert-success">
        <strong>{{ session()->get('message') }}</strong>
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
  @endif
    <div class="card-header">
        <div>
            <h3 align="center">Data Peserta Test</h3>
        </div>        
    </div>
    <div class="card-body">
      <div style="margin-bottom: 20px;">
        <a href="{{route('peserta.create')}}" class="btn btn-dark">Tambah Data</a>
      </div>
        <table class="table table-bordered" id="example1">
            <thead class="thead-dark">
              <tr align="center">
                <th scope="col">No</th>
                <th scope="col">Nama Peserta</th>
                <th scope="col">Email</th>
                <th scope="col">Nilai X</th>
                <th scope="col">Nilai Y</th>
                <th scope="col">Nilai Z</th>
                <th scope="col">Nilai W</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($peserta as $no => $peserta)
              <tr align="center">
                <th scope="row">{{$no + 1}}</th>
                <td>{{$peserta->peserta_nama}}</td>
                <td>{{$peserta->peserta_email}}</td>
                <td>{{$peserta->peserta_nilai_x}}</td>
                <td>{{$peserta->peserta_nilai_y}}</td>
                <td>{{$peserta->peserta_nilai_z}}</td>
                <td>{{$peserta->peserta_nilai_w}}</td>
                <td>
                    <a href="{{ route('peserta.report', $peserta->peserta_id) }}" class="btn btn-sm btn-primary" style="margin-bottom: 2px;">Lihat Laporan</a>
                    <br>
                    <a href="{{ route('peserta.edit', $peserta->peserta_id) }}" class="btn btn-sm btn-warning">Edit</a>                    
                    <button type="button" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('peserta.delete', $peserta->peserta_id) }}')"><i class="fa fa-trash"></i> Delete</button>
                </td>
              </tr> 
              @endforeach            
            </tbody>
          </table>                    
    </div>
</div>
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Delete Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="" method="POST" id="formDelete">
              <div class="modal-body">
                  @csrf
                  @method('delete')
                  Yakin Hapus Data ?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info btn-sm">Delete</button>
              </div>
          </form>
      </div>
  </div>
</div>

<script>
  // untuk hapus data
  function mHapus(url) {
      $('#ModalHapus').modal()
      $('#formDelete').attr('action', url);
  }
</script>

@endsection