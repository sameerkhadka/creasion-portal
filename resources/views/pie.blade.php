<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <title>Doughnut Chart Using Chart JS</title>
</head>
<body>
<label for="project">Choose a project:</label>
<select name="project" id="project" class="project">
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
</select>
<h1>Oxygen</h1>
<canvas id="pie-chart" height="50" width="150"></canvas>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script type="text/javascript">
var data = [{
  data: [<?php echo $quantity; ?>],
  backgroundColor: [<?php echo $color; ?>],
  hoverBackgroundColor: [<?php echo $color; ?>],
}];

var options = {
  responsive: true,
  legend: {
    onClick: (e) => e.stopPropagation(),
            display: true,
            postion: 'right',
         },
  tooltips: {
    enabled: true
  },
  plugins: {
    datalabels: {
      formatter: (value, ctx) => {
        let sum = ctx.dataset._meta[0].total;
        let percentage = (value * 100 / sum).toFixed(2) + "%";
        return percentage;
      },
      color: '#fff',
    }
  }
};

var ctx = document.getElementById("pie-chart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
  labels: [<?php echo $chartData; ?>],
    datasets: data
  },
  options: options
});
</script>

<script>
$(document).ready(function(){
  $('.project').change(function(){
      var value = $(this).val();
      console.log(value);
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        url:"{{ route('dynamic') }}",
        type:"POST",
        data:{ value:value },
        beforeSend: function () {
        },
        success: function(data){
          console.log('done');
        }
      });
  });
});
</script>

</html>
