
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
  <h3 align="center">Insert Image into Wardrobe</h3>
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
             <h3 class="panel-title">User Form</h3>
         </div>
         <div class="panel-body">
         <br />
         <form method="post" action="{{ url('store_image/insert_image') }}"  enctype="multipart/form-data">
          @csrf
          <div class="form-group">
          <div class="row">
           <label class="col-md-4" align="right">Enter Info</label>
           <div class="col-md-8">
            <input type="text" name="user_name" class="form-control" />
           </div>
          </div>
         </div>

         <div class="form-group">
          <div class="row">
           <label class="col-md-4" align="right">Select Image</label>
           <div class="col-md-8">
            <input type="file" name="user_image" />
           </div>
          </div>
         </div>

         <div class="form-group">
         <div class="row">
            <label class="col-md-4" align="right">Choose a type:</label>
            <div class="col-md-8">
                <input type="radio" name="type" value="Innerwear">
                <label>Innerwear</label><br>
                <input type="radio" name="type" value="Outterwear">
                <label>Outterwear</label><br>
                <input type="radio" name="type" value="Bottom">
                <label>Bottom</label><br>
                <input type="radio" name="type" value="Shoes">
                <label>Shoes</label>
            </div>
        </div>  
        </div>

        <div class="form-group">
         <div class="row">
            <label class="col-md-4" align="right">Choose a color:</label>
            <div class="col-md-8">
                <input type="color" id="color" name="color" value="#ff0000"><br><br>
            </div>
        </div>  
        </div>
        
         <div class="form-group" align="center">
          <br />
          <br />
          <button type="button" onclick="window.location='/wardrobe'">Back</button>
          <input type="submit" name="store_image" class="btn btn-primary" value="Upload" />
          
         </div>
         </form>
      </div>
     </div>
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">User Data</h3>
         </div>
         <div class="panel-body">
         <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                     <th width="30%">Image</th>
                     <th width="10%">Type</th>
                     <th width="60%">Name</th>
                  </tr>
                  @foreach($data as $row)
                  <tr>
                   <td>
                    <img src="store_image/fetch_image/{{ $row->id }}"  class="img-thumbnail" width="75" />
                   </td>
                   <td>{{ $row->type }}</td>
                   <td>{{ $row->user_name }}</td>
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
