@extends('users-mgmt.base')
@section('action-content')

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-container">
  <h4> <b> HASIL PREDIKSI MENGGUNAKAN METODE SVM </b></h4>
  <div class="w3-panel w3-red">
    <h3>Hasil Prediksi!</h3>
    <p> Kanker Result : {{$resBody}}.</p>
    <p> Segera lakukan pengecekan ke Rumah Sakit terdekat </p>
    <div class="form-group">
                           
                        </div>
  </div>
  <div class="form-group">
					    	<div class="form-group">
                <form action="{{route('prediksis.save', ['id'=> $id]) }} " method="post">
                {{ csrf_field() }}
                  <button type="submit" name="CLASS"  value ="{{$resBody}}" class="btn btn-danger ">Save Data</button>
                   </form>
                </div>
					    </form>
					</div>
</div>
</body>
</html>

@endsection

 