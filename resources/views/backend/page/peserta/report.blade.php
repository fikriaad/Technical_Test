@extends ('backend/layout.app')

@section ('content')
<div class="card">
    <div class="card-header" align="center">
      <h3>
        Laporan Penilaian Peserta Test
      </h3>
      
    </div>
    <div class="card-body" > 
      <div class="row" style="margin-bottom: 20px;">          
        <div class="col-2 col-md-2 col-sm-3">
          <p>NAMA</p>
          
          <p>EMAIL</p>
        </div>
        <div class="col-4 col-md-4 col-sm-5">
          <p>: {{$laporan->peserta_nama}}</p>            
          <p>: {{$laporan->peserta_email}}</p>
        </div>                            
      </div>       
        <table class="table table-bordered">
            <thead class="thead-dark " align="center">
              <tr>
                <th scope="col">Aspek</th>
                <th scope="col">1</th>
                <th scope="col">2</th>
                <th scope="col">3</th>
                <th scope="col">4</th>
                <th scope="col">5</th>
              </tr>
            </thead>
            <tbody align="center">
              <tr>
                <th scope="row" class="table-secondary">Aspek Intelegensi</th>
                <td>
                  @if ($intelegensi > 0 && $intelegensi <= 5.4 )
                      V
                  @else
                      
                  @endif
                </td>
                <td>
                  @if ($intelegensi > 5.4 && $intelegensi <= 10.8 )
                      V
                  @else
                      
                  @endif
                </td>
                <td>
                  @if ($intelegensi > 10.8 && $intelegensi <= 16.2 )
                      V
                  @else
                      
                  @endif
                </td>
                <td>
                  @if ($intelegensi > 16.2 && $intelegensi <= 21.6 )
                      V
                  @else
                      
                  @endif
                </td>
                <td>
                  @if ($intelegensi > 21.6 && $intelegensi <= 27 )
                      V
                  @else
                      
                  @endif
                </td>
              </tr>
              <tr>
                <th scope="row" class="table-secondary">Aspek Numerical Ability</th>
                <td>
                  @if ($ability > 0 && $ability <= 2.9 )
                      V
                  @else
                      
                  @endif
                </td>
                <td>
                  @if ($ability > 2.9 && $ability <= 5.8 )
                      V
                  @else
                      
                  @endif
                </td>
                <td>
                  @if ($ability > 5.8 && $ability <= 8.7 )
                      V
                  @else
                      
                  @endif
                </td>
                <td>
                  @if ($ability > 8.7 && $ability <= 11.6 )
                      V
                  @else
                      
                  @endif
                </td>
                <td>
                  @if ($ability > 11.6 && $ability <= 14.5 )
                      V
                  @else
                      
                  @endif
                </td>
              </tr>              
            </tbody>
          </table> 
          <a href="{{route('peserta')}}" type="button" class="btn btn-primary">Back</a>                 
    </div>
</div>
@endsection