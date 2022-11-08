
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Insert Image into Wardrobe</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
 <div class="container">    
  <br />
  <button type="button" class="w3-large" onclick="window.location='/'">Home</button>
  <h3 align="left">Id : </h3>
  <h3 align="left">Email : </h3>
    <br />
    @if($errors->any())
    <div class="alert alert-danger">
           <ul>
           @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
           @endforeach
           </ul>
        </div>
    @endif

    @if(session()->has('success'))
     <div class="alert alert-success">
     {{ session()->get('success') }}
     </div>
    @endif
    <br />

     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">Favorite list</h3>
         </div>
         <div class="panel-body">
         <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                     <th width="33%">Innerwear</th>
                     <th width="33%">Outterwear</th>
                     <th width="34%">Bottom</th>
                  </tr>
                  @foreach($data as $row)
                  <tr>
                   <td>
                    <img src="account/fetch_inner/{{ $row->id }}"  class="img-thumbnail" width="75" />
                   </td>
                   <td>
                   <img src="account/fetch_outter/{{ $row->id }}"  class="img-thumbnail" width="75" />
                   </td>
                   <td>
                   <img src="account/fetch_bottom/{{ $row->id }}"  class="img-thumbnail" width="75" />
                </td>
                  </tr>
                  @endforeach
              </table>
              {!! $data->links() !!}
             </div>
         </div>
     </div>
    </div>
 </body>
</html>
