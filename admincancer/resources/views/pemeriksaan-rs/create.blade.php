@extends('pemeriksaan-rs.base')
@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new pemeriksaan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('pemeriksaans.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Pasien</label>
                            <div class="col-md-6">
                                <select class="form-control " name="pasiens_id">
                                    <option value="-1">Please select patient name</option>
                                    @foreach ($pasiens as $pasien)
                                        <option value="{{$pasien->id}}">{{$pasien->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Dokter</label>
                            <div class="col-md-6">
                                <select class="form-control" name="dokters_id">
                                    <option value="-1">Please select doctor name</option>
                                     @foreach ($dokters as $dokter)
                                        <option value="{{$dokter->id}}">{{$dokter->nama}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-6">
                                <select class="form-control" name="category_id">
                                    <option value="-1">Please select your category</option>
                                      @foreach ($category as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">Tanggal Periksa</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ old('tgl_periksa') }}" name="tgl_periksa"  class="form-control pull-right" id="birthDate" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('hasil_periksa') ? ' has-error' : '' }}">
                            <label for="hasil" class="col-md-4 control-label">Hasil Pemeriksaan</label>
                            <div class="col-md-6">
                                <input id="hasil_periksa" type="text" class="form-control" name="hasil_periksa" required>

                                @if ($errors->has('hasil_periksa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hasil_periksa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('resep_obat') ? ' has-error' : '' }}">
                            <label for="resep" class="col-md-4 control-label">Resep Obat</label>

                            <div class="col-md-6">
                                <input id="resep_obat" type="text" class="form-control" name="resep_obat" required>

                                @if ($errors->has('resep_obat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resep_obat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('treatment') ? ' has-error' : '' }}">
                            <label for="treatment" class="col-md-4 control-label">Treatment</label>

                            <div class="col-md-6">
                                <input id="treatment" type="textarea" class="form-control" name="treatment" required >

                                @if ($errors->has('treatment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('treatment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
