@extends('users-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List Of Dokter</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('dokters.create') }}">Add new Dokter</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('dokters.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['nama', 'alamat'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['nama'] : '', isset($searchingVals) ? $searchingVals['alamat'] : '']])
          @endcomponent
          </br>
          @component('layouts.two-cols-search-row', ['items' => ['tanggalLahir', 'tempatLahir'],
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
            @foreach ($dokters as $dokter)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $dokter->nama }}</td>
                  <td>{{ $dokter->email }}</td>
                  <td class="hidden-xs">{{ $dokter->alamat }}</td>
                  <td class="hidden-xs">{{ $dokter->tanggalLahir}}</td>
                  <td class="hidden-xs">{{ $dokter->tempatLahir}}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('dokters.destroy', ['id' => $dokter->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('dokters.edit', ['id' => $dokter->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                        @if ($dokter->nama != Auth::user()->nama)
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
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($dokters)}} of {{count($dokters)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $dokters->links() }}
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