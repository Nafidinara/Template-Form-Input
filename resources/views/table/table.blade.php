@extends('base')
@section('content')
    <div class="container">
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css')}}">
    <script src="{{url('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('https://use.fontawesome.com/9564038555.js')}}"></script>
    <div class="card" style="margin-top:5%; ">
        <h4 class="card-header">Tabel File</h4>
        <div class="card-body col" style="padding: 5%;">
{{--            @php--}}
{{--            dd($data);--}}
{{--            @endphp--}}
            <table class="table table-striped table-bordered data">
                <thead>
                <tr style="text-align: center">
                    <th>Nomor</th>
                    <th>Dibuat</th>
                    <th>file id</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @if(is_array($data) || is_object($data))
                @foreach($data as $key=>$datas)
                    <tr style="text-align: center">
                        <td>{{$key+1}}</td>
                        <td>{{$datas->created_at}}</td>
                        <td>{{$datas->file_id}}</td>
                        <td>
                            <a href="{{url('download/'.$datas->file_id)}}"><button class="btn" style="width:100%"><i class="fa fa-download"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.data').DataTable();
        });
    </script>
@endsection
