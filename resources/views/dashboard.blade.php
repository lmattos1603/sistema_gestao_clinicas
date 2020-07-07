@extends('template')

@section('scripts')
  <!-- Relatorio em Linha
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Hora', 'Total Agendamentos'],
          @foreach ($agendamento_dia as $ad)
          ['{{ $ad->data }}',  {{ $ad->quantidade }}],
          @endforeach
        ]);
        var options = {
          title: 'Agendamentos por dia',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    Relatório abaixo é em coluna
    -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
           @foreach ($agendamento_dia as $ad)
          ['{{ $ad->data }}',  {{ $ad->quantidade }}, "# b87333"],
          @endforeach
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Agendamento por dia",
        width: 1000,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

@endsection

@section('conteudo')
	<div class="row">
		<div class="col-md-1">
			<div class="col-md-8" id="columnchart_values" style="width: 900px; height: 300px;  padding: 20px; float: right;">
			</div>
		</div>
	</div>

@endsection 