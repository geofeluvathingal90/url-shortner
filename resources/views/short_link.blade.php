@extends('page_layouts.layout')
@section('head') 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection 
@section('content') 
<h1> Laravel URL shortener </h1>  
 
<div class="card">  
  <div class="card-header">  
    <form method="POST" action="{{ route('create.shorten.link.post') }}" id="create-short-url"> 
        @csrf  
        <div class="input-group mb-3">  
            <input id="url-link" type="text" name="link" class="form-control" placeholder="Enter URL">  
            <button class="btn btn-success create-btn" type="submit">Create Shorten Link</button>  
        </div>  
    </form>  
  </div>  
  <div class="card-body">  
        <div class="script-alert alert alert-danger" style="display: none;">
            <strong>Please enter valid link</strong>
        </div>
        @if (Session::has('success'))  
            <div class="alert alert-success">  
                <strong>{{ Session::get('success') }}</strong>  
            </div>  
        @endif  
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        <table class="table table-bordered table-sm">  
            <thead>  
                <tr>  
                    <th>ID</th>  
                    <th>Short Link</th>  
                    <th>Link</th>  
                    <th>Visited Count</th>  
                </tr>  
            </thead>  
            <tbody>  
                @foreach($shortLinks as $row)  
                    <tr>  
                        <td>{{ $loop->iteration }}</td>  
                        <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>  
                        <td>{{ $row->link }}</td>  
                        <td>{{ $row->visted_count }}</td>  
                    </tr>  
                @endforeach  
            </tbody>  
        </table>  
  </div>  
</div>  
<script>
    $('body').on("click", ".create-btn", function (e)
    {   
        e.preventDefault();
        var url = $("#url-link").val().trim();
        if(url && (/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(url)))
        {
            $("#create-short-url").submit();
        }
        else{
            $(".alert-danger, .alert-success").hide();
            $(".script-alert").show();
        }
    });
</script>
@endsection      
