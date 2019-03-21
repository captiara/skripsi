@extends('users-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List Of Pasien</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('pasiens.create') }}">Add new Pasien</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('pasiens.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['nama', 'alamat'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['nama'] : '', isset($searchingVals) ? $searchingVals['alamat'] : '']])
          @endcomponent
          </br>
          @component('layouts.two-cols-search-row', ['items' => ['tanggal Lahir', 'tempat Lahir'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['tanggalLahir'] : '', isset($searchingVals) ? $searchingVals['tempatLahir'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">nama</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Tempat Lahir</th>
                <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">tanggal Lahir</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($pasiens as $pasien)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $pasien->nama }}</td>
                  <td>{{ $pasien->email }}</td>
                  <td class="hidden-xs">{{ $pasien->alamat }}</td>
                  <td class="hidden-xs">{{ $pasien->tanggalLahir}}</td>
                  <td class="hidden-xs">{{ $pasien->tempatLahir}}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('pasiens.destroy', ['id' => $pasien->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('pasiens.edit', ['id' => $pasien->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                        @if ($pasien->nama != Auth::user()->nama)
                         <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Delete
                        </button>
                        @endif
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th width="10%" rowspan="1" colspan="1">nama</th>
                <th width="20%" rowspan="1" colspan="1">Email</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">Tanggal Lahir</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">Tempat Lahir</th>
                <th rowspan="1" colspan="2">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($pasiens)}} of {{count($pasiens)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $pasiens->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection