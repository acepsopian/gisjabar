<style>
	table.gridtable {
		font-size:11px;
		color:#333333;
		border-width: 1px;
		border-color: #666666;
		border-collapse: collapse;
	}
	table.gridtable th {
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #666666;
		background-color: #dedede;
	}
	table.gridtable td {
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #666666;
		background-color: #ffffff;
	}
</style>
<div class="container">
	<h1 align="center">Grafik Jumlah Penduduk Berdasarkan Pekerjaan</h1>
	<div class="content">
		<div id="diagram" style="width:650;height:450px" align="center">
			<canvas id="pekrjaan" width="300" height="400" align="left"></canvas>
			<canvas id="pekrjaan1" width="100" height="400" align="center"></canvas>
			<canvas id="pekrjaan2" width="300" height="400" align="right"></canvas>
		</div>
		<!--div align="center">
			<table class="gridtable">
						<tr>
							<th  width="125">No KTP</th>
							<th  width="200">Nama</th>
							<th  width="50">Pekerjaan</th>
						</tr>
						<?php 
						foreach ($dataJK->result() as $row) {
						?>
						<tr>
							<td><?=$row->no_ktp?></td>
							<td><?=$row->nama?></td>
							<td><?=$row->pekerjaan?></td>
						</tr>
						<?php } ?>
			</table>
		</div-->
</div>

<script>
	// var canvasNode = document.getElementById("canvas");
	// var canvasParent = document.getElementById("diagram");
	// canvasNode.width = (canvasParent.clientWidth * 80) / 100;
	// canvasNode.height = canvasParent.clientHeight;
	// <?php
	// 	$phpArr = $lblDiagram;
	// 	$jsArr = json_encode($phpArr);
	// 	echo "var labelArr = ". $jsArr . ";\n";
	// ?>
	// <?php
	// 	$phpArr = $dataDiagram;
	// 	$jsArr = json_encode($phpArr);
	// 	echo "var dataArr = ". $jsArr . ";\n";
	// ?>
	// var lineChartData = {
	// 	labels : labelArr,
	// 	datasets : [
	// 		{
	// 			fillColor : "rgba(151,187,205,0.5)",
	// 			strokeColor : "rgba(151,187,205,1)",
	// 			pointColor : "rgba(151,187,205,1)",
	// 			pointStrokeColor : "#fff",
	// 			data : dataArr
	// 		}
	// 	]
		
	// }

	// var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	var pieData = [
                {
                    value: <?=$dataDiagram[0]?>,
                    color:"#878BB6",
					highlight: "rgba(120,187,205,0.5)",
					label: ['<?=$lblDiagram[0]?>', '<?=round($dataDiagram[0]/array_sum($dataDiagram)*100)?>']
                },
                {
                    value : <?=$dataDiagram[1]?>,
                    color : "#4ACAB4",
					highlight: "rgba(120,187,205,0.5)",
					label: ['<?=$lblDiagram[1]?>', '<?=round($dataDiagram[1]/array_sum($dataDiagram)*100)?>']
                },
                {
                    value : <?=$dataDiagram[2]?>,
                    color : "#FF7F74",
					highlight: "rgba(120,187,205,0.5)",
					label: ['<?=$lblDiagram[2]?>', '<?=round($dataDiagram[2]/array_sum($dataDiagram)*100)?>']
                },
                {
                    value : <?=$dataDiagram[3]?>,
                    color : "#E67817",
					highlight: "rgba(120,187,205,0.5)",
					label: ['<?=$lblDiagram[3]?>', '<?=round($dataDiagram[3]/array_sum($dataDiagram)*100)?>']
                }
            ];
            // pie chart options
           	var pieOptions = 
	        {
	            tooltipTemplate: "<%=label[0]%> : <%= label[1] %>% (<%= value %> Orang)",
	            
	            // onAnimationComplete: function()
	            // {
	            //     this.showTooltip(this.segments, true);
	            // },

	            tooltipEvents: ["mousemove", "touchstart", "touchmove"],
	            
	            showTooltips: true
	        }

	        // Bar Chart Data
	        <?php
				$phpArr = $lblDiagram;
				$jsArr = json_encode($phpArr);
				echo "var labelArr = ". $jsArr . ";\n";
			?>
			<?php
				$phpArr = $dataDiagram;
				$jsArr = json_encode($phpArr);
				echo "var dataArr = ". $jsArr . ";\n";
			?>

	        var barData = {
			    labels: labelArr,
			    datasets: [
			        {
			            //label: "My First dataset",
			            fillColor: "rgba(151,187,205,0.5)",
			            strokeColor: "rgba(151,187,205,0.8)",
			            highlightFill: "rgba(151,187,205,0.75)",
			            highlightStroke: "rgba(151,187,205,1)",
			            data: dataArr
			        }
			    ]
			};

			// Bar Chart Option
			var barOptions =
			{
			    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
			    scaleBeginAtZero : true,

			    //Boolean - Whether grid lines are shown across the chart
			    scaleShowGridLines : true,

			    //String - Colour of the grid lines
			    scaleGridLineColor : "rgba(0,0,0,.05)",

			    //Number - Width of the grid lines
			    scaleGridLineWidth : 1,

			    //Boolean - If there is a stroke on each bar
			    barShowStroke : true,

			    //Number - Pixel width of the bar stroke
			    barStrokeWidth : 2,

			    //Number - Spacing between each of the X value sets
			    barValueSpacing : 5,

			    //Number - Spacing between data sets within X values
			    barDatasetSpacing : 1,
			}
	



            // get pie chart canvas
            var pekrjaan= $("#pekrjaan").get(0).getContext("2d");
            // draw pie chart
            new Chart(pekrjaan).Pie(pieData, pieOptions);

            // get bar chart canvas
            var pekrjaan2= $("#pekrjaan2").get(0).getContext("2d");
            // draw pie chart
            new Chart(pekrjaan2).Bar(barData, barOptions);
</script>