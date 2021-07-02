<html>

  <head>
    <title>Request Form</title>
  </head>  

  <body>   
  <form action="{{ route('request') }}" method="POST">
    @csrf
  <label for="type">Who are you:</label>

  <select name="req_type" id="type">
    <option value="individual">Individual</option>
    <option value="institution">Institution</option>
  </select>

  <div id="individual" class="group">
  <br>Individual form <br><br>
    Name: <input type="text" name="name"> <br> <br>
    Gender:
        <select name="gender">
        <option value="male" selected>Male</option>   
        <option value="female">Female</option>
        <option value="others">Others</option>
        </select> <br> <br>
    Age:<input type="number" name="age"> <br> <br>
    Province:<input type="number" name="province_id"> <br> <br>
    District:<input type="number" name="district_id"> <br> <br>
    Local Level:<input type="number" name="local_level_id"> <br> <br>
    Coordinates:<input type="text" name="coordinate"> <br> <br>
    <textarea name="detail" rows="4" cols="50"> Message </textarea> <br> <br>
    </div>
    
    <div id="institution" class="group">  
      <br>Institution form<br>
    <br>
      Name: <input type="text" name="title"> <br> <br>
      Institution type:
      <select name="type">
        <option selected></option>   
        @foreach($types as $type)
        <option value="{{ $type->id }}">{{ $type->title }}</option>
        @endforeach
    </select> <br> <br>
      Contact Person:<input type="text" name="contact_person"> <br> <br>
      Contact Number:<input type="text" name="contact_number"> <br> <br>
      Province:
      <select name="province">
        <option selected></option>
      @foreach($province as $item)
        <option value="{{ $item->id }}">{{ $item->title_ne }}</option>
      @endforeach
      </select> <br> <br>
      District:
      <select name="district">
        <option selected></option>
      @foreach($district as $item)
        <option value="{{ $item->id }}">{{ $item->title_ne }}</option>
      @endforeach
      </select> <br> <br>
      Local Level:
      <select name="local_level">
        <option selected></option>
      @foreach($local as $item)
        <option value="{{ $item->id }}">{{ $item->title_ne }}</option>
      @endforeach
      </select> <br> <br>
      Coordinates:<input type="text" name="coordinates"> <br> <br>
      <textarea name="details" rows="4" cols="50"> Message </textarea> <br> <br>
</div>
<button type="submit">Request</button>
</form>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.group').hide();
      $('#individual').show();
      $('#type').change(function () {
        $('.group').hide();
        $('#'+$(this).val()).show();
      })
  });
  </script>
</html>

