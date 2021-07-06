<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal Relief Fund</title>
</head>

<body>
    <form action="{{ route('request') }}" method="POST">
        @csrf
        <label for="type">Who are you:</label>

        <select name="req_type" id="type">
            <option value="individual">Individual</option>
            <option value="institution">Institution</option>
        </select>
        <br>
        <br>

        <div class="filter-card">
            <label>Province</label>

            <select name="province_id" id="provinces">
                <option value="-1" selected >Select</option>
            </select>

        </div>

        <div class="filter-card">
            <label>District</label>

            <select name="district_id" id="districts">
                <option value="-1" selected >Select</option>
            </select>

        </div>
        <div class="filter-card">
            <label>Municipality</label>

            <select name="local_level_id" id="municipalities">
                <option value="-1" selected >Select</option>
            </select>

        </div>

        <div id="individual" class="group">
            <br>Individual form <br><br>
            Project:
            <select name="project">
                <option value="" selected></option>
                @foreach ($project as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select> <br> <br>
            Name: <input type="text" name="name"> <br> <br>
            Gender:
            <select name="gender">
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select> <br> <br>
            Contact Number:<input type="text" name="phone"> <br> <br>
            Age:<input type="number" name="age"> <br> <br>

            <br> <br>
            Coordinates:<input type="text" name="coordinate"> <br> <br>
            <textarea name="detail" rows="4" cols="50"> Message </textarea> <br> <br>
        </div>

        <div id="institution" class="group">
            <br>Institution form<br>
            <br>
            Project:
            <select name="projects">
                <option value="" selected></option>
                @foreach ($project as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select> <br> <br>
            Name: <input type="text" name="title"> <br> <br>
            Institution type:
            <select name="type">
                <option selected></option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                @endforeach
            </select> <br> <br>
            Contact Person:<input type="text" name="contact_person"> <br> <br>
            Contact Number:<input type="text" name="contact_number"> <br> <br>
            Coordinates:<input type="text" name="coordinates"> <br> <br>
            <textarea name="details" rows="4" cols="50"> Message </textarea> <br> <br>
        </div>
        <button type="submit">Request</button>
    </form>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="module" src="{{ asset('js/custom.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.group').hide();
        $('#individual').show();
        $('#type').change(function() {
            $('.group').hide();
            $('#' + $(this).val()).show();
        })
    });
</script>

</html>
