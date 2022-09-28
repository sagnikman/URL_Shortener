<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="icon" href="https://freeiconshop.com/wp-content/uploads/edd/link-open-flat.png">
<style>
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&family=Roboto:ital,wght@1,500&display=swap');
*{
    font-family: 'IBM Plex Sans', 'Verdana', 'Arial';
}

input[type=text] {
  border: 0.25pt solid #83979F;
  background-color: #06303E;
}
input[type=url] {
  border: 0.25pt solid #83979F;
  background-color: #06303E;
}
input[type=text]:hover {
  border: none;
  background-color: #03181F;
}
input[type=url]:hover {
  border: none;
  background-color: #03181F;
}
input[type=text]:focus {
  border: none;
  background-color: #03181F;
}
input[type=url]:focus {
  border: none;
  background-color: #03181F;
}
#button1 {
  background-color: #06303E;
  border: 1pt solid #83979F;
}
#button1:hover {
  background-color: #03181F;
  border: 2pt solid #83979F;
}
</style>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
</head>
<body style="background-color: #06303E">
    <br>
    <br>
    <p class="h2 text-center" style="color: white;"><strong>URL Shortener</strong></p>
    <br>
    <br>
    <br>
    <form action="{{route('create')}}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value=1>
        <div class="form-row justify-content-center" style="margin-bottom: 0pt;">
            <div class="form-group col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-2">
                <div class="input-group mx-auto mb-3">
                    <input style="color: white; text-align:center;" class="form-control" type="url" 
                    size="2" name="url" style="text-align:center" 
                    placeholder="Enter URL" value="{{old('url')}}" id="textsend" onkeyup="success()">
                  </div>
                  <div class="text-danger" style="font-size: 10pt">
                    @error('url')
                      {{$message}}
                    @enderror
                  </div>
                
            </div>
        </div>

        <div class="form-row justify-content-center">
            <div class="form-group col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-2">
                <div class="input-group mx-auto mb-3">
                    <input style="color: white; text-align:center" class="form-control" type="text"
                     size="2" name="slug" style="text-align:center" 
                     placeholder="Enter Slug" value="{{old('slug')}}" maxlength="8">
                     <small id="passwordHelpBlock" class="form-text text-muted">
                      Your slug must be 1-8 characters long, contain only letters or numbers, you can leave this blank for random slug 
                    </small>
                    </div>
                    <div class="text-danger" style="font-size: 10pt">
                      @error('slug')
                        {{$message}}
                      @enderror
                    </div>
                
            </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="text-center align-items-center col-xl-4 col-lg-3 col-md-3 col-sm-3 col-xs-2">
            <button type="submit" class="btn btn-primary" id="button1" disabled>Create</button>
         </div>
        </div>
        
    </form>
    <br><br>
    @if(session('createdUrl'))
    <p class="h6 text-center" style="color: white;">
     Created Short URL
     <br> 
      <div class="col-md-12 text-center">
        <a href="{{session('createdUrl')}}" target="_blank" style="border: 0.25pt solid #83979F; padding:2pt">{{session('createdUrl')}}</a>
     </div>
    </p>
    @endif
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
<script>
  function success() {
    if(document.getElementById("textsend").value==="") { 
           document.getElementById('button1').disabled = true; 
       } else { 
           document.getElementById('button1').disabled = false;
       }
   }  
</script>
</body>
</html>