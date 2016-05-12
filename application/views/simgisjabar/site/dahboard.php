<div class="row">
	        <div class="span6">
	          <div class="widget widget-nopad">
	            <div class="widget-header"> <i class="icon-list-alt"></i>
	              <h3>Status Saat Ini</h3>
	            </div>
	            <!-- /widget-header -->
	            <div class="widget-content">
	              <div class="widget big-stats-container">
	                <div class="widget-content">
	                  <h6 class="bigstats">Data berikut merupakan data aktual dan sesuai dengan basis data yang digunakan dalam aplikasi SIMDES ini.</h6>
	                  <div id="big_stats" class="cf">
	                    <div class="stat" title="Data Penduduk"> <i class="icon-group"></i> <span class="value"><?=$mhsActCount?></span><p class="bigstats">Jumlah Penduduk</p>
	                    </div>
	                    <!-- .stat -->
	                    
	                    <div class="stat" title="Data Keluarga"> <i class="icon-home"></i> <span class="value"><?=$klgCount?></span> <p class="bigstats">Jumlah Keluarga</p></div>
	                    <!-- .stat -->
	                    
	                    <div class="stat" title="Data Surat"> <i class="icon-envelope"></i> <span class="value"><?=$suratCount?></span> <p class="bigstats">Jumlah Surat</p></div>
	                    <!-- .stat -->
	                  </div>
	                </div>
	                <!-- /widget-content --> 
	                
	              </div>
	            </div>
	          </div>
	          <!-- /widget -->
	        </div>
	        <!-- /span6 -->
	        <div class="span6">
	          <div class="widget">
	            <div class="widget-header"> <i class="icon-bookmark"></i>
	              <h3>Tautan Penting</h3>
	            </div>
	            <!-- /widget-header -->
	            <div class="widget-content">
	              <div class="shortcuts"> 
	                <a href="#" class="shortcut" onclick="loadContent('daftar_desa')">
	                  <i class="shortcut-icon icon-picture"></i>
	                  <span class="shortcut-label">Data Dusun</span> </a>
	                <a href="#" class="shortcut" onclick="loadContent('daftar_penduduk')">
	                  <i class="shortcut-icon icon-user"></i>
	                  <span class="shortcut-label">Daftar Penduduk</span> </a>
	                <a href="#" class="shortcut" onclick="loadContent('daftar_keluarga')">
	                  <i class="shortcut-icon icon-home"></i>
	                  <span class="shortcut-label">Daftar Keluarga</span> </a>
	                <a href="#" class="shortcut" onclick="loadContent('laporan/j_kel')"> 
	                  <i class="shortcut-icon icon-signal"></i>
	                  <span class="shortcut-label">Grafik</span> </a>
	                <a href="#" class="shortcut" onclick="loadContent('daftar_surat')">
	                  <i class="shortcut-icon icon-paste"></i> 
	                  <span class="shortcut-label">Buat Surat</span> </a>
	                <a href="#" class="shortcut" onclick="loadContent('daftar_surat/list_surat')"> 
	                  <i class="shortcut-icon icon-list"></i> 
	                  <span class="shortcut-label">List Surat</span> </a>
	              </div>
	              <!-- /shortcuts --> 
	            </div>
	            <!-- /widget-content --> 
	          </div>
	          <!-- /widget -->
	        </div>
	        <!-- /span6 --> 
	      </div>
	      <!-- /row --> 
	      <div class="row">
	        <div class="span6">
	          <div class="widget">
	            <div class="widget-header"> <i class="icon-signal"></i>
	              <h3> Grafik Penduduk Berdasarkan Katergori Usia</h3>
	            </div>
	            <!-- /widget-header -->
	            <div class="widget-content" id="diagram">
	              <canvas id="canvas" class="chart-holder" height="250" width="550"> </canvas>
	              <!-- /area-chart --> 
	            </div>
	            <!-- /widget-content --> 
	          </div>
	          <!-- /widget -->
	        </div>
	        <!-- /span6 -->
	        <div class="span6">
	          <div class="widget">
	            <div class="widget-header"> <i class="icon-signal"></i>
	              <h3> Persentase Ekonomi Penduduk</h3>
	            </div>
	            <!-- /widget-header -->
	            <div class="widget-content" id="diagram">
	              <canvas id="canvas2" class="chart-holder" height="250" width="550"> </canvas>
	              <!-- /area-chart --> 
	            </div>
	            <!-- /widget-content --> 
	          </div>
	          <!-- /widget -->
	        </div>
	        <!-- /span6 -->
	      </div>
	      <!-- /row -->
<script>
	// var canvasNode = document.getElementById("canvas");
	// var canvasParent = document.getElementById("diagram");
	// canvasNode.width = (canvasParent.clientWidth * 95) / 100;
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
	// Bar Chart Data
	        <?php
				$phpArr = $lblDiagram;
				$jsArr = json_encode($phpArr);
				echo "var labelArr = ". $jsArr . ";\n";
			?>
			<?php
				// $phpArr = $dataDiagram;
				// $jsArr = json_encode($phpArr);
				// echo "var dataArr = ". $jsArr . ";\n";

				#balita
				$phpArr1 = $balita;
				$jsArr1 = json_encode($phpArr1);
				echo "var balita = ". $jsArr1 . ";\n";

				#anak_anak
				$phpArr2 = $anak_anak;
				$jsArr2 = json_encode($phpArr2);
				echo "var anak_anak = ". $jsArr2 . ";\n";

				#remaja
				$phpArr3 = $remaja;
				$jsArr3 = json_encode($phpArr3);
				echo "var remaja = ". $jsArr3 . ";\n";

				#dewasa
				$phpArr4 = $dewasa;
				$jsArr4 = json_encode($phpArr4);
				echo "var dewasa = ". $jsArr4 . ";\n";

				#tua
				$phpArr5 = $tua;
				$jsArr5 = json_encode($phpArr5);
				echo "var tua = ". $jsArr5 . ";\n";
			?>

	        var barData = {
			    // labels: labelArr,
			    // datasets: [
			    //     {
			    //         //label: "My First dataset",
			    //         fillColor: "rgba(151,187,205,0.5)",
			    //         strokeColor: "rgba(151,187,205,0.8)",
			    //         highlightFill: "rgba(151,187,205,0.75)",
			    //         highlightStroke: "rgba(151,187,205,1)",
			    //         data: dataArr
			    //     }
			    // ]

			    labels: labelArr,
			    datasets: [
			        {
			            label: "Balita (0 s/d 5 Thn)",
			            fillColor: "#878BB6",
			            strokeColor: "#878BB6",
			            highlightFill: "#878BB7",
			            highlightStroke: "#878BB7",
			            data: balita
			        },
			        {
			            label: "Anak-anak (6 s/d 14 Thn)",
			            fillColor: "#4ACAB4",
			            strokeColor: "#4ACAB4",
			            highlightFill: "#4ACAB5",
			            highlightStroke: "#4ACAB5",
			            data: anak_anak
			        },
			        {
			            label: "Remaja (15 s/d 20 Thn)",
			            fillColor: "#FF7F74",
			            strokeColor: "#FF7F74",
			            highlightFill: "#FF7F75",
			            highlightStroke: "#FF7F75",
			            data: remaja
			        },
			        {
			            label: "Dewasa (21 s/d 30 Thn)",
			            fillColor: "#E67817",
			            strokeColor: "#E67817",
			            highlightFill: "#E67818",
			            highlightStroke: "#E67818",
			            data: dewasa
			        },
			        {
			            label: "Tua (31 Thn Keatas)",
			            fillColor: "#00BA8B",
			            strokeColor: "#00BA8B",
			            highlightFill: "#00BA8A",
			            highlightStroke: "#00BA8A",
			            data: tua
			        },

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

			    // String - Template string for single tooltips
			    multiTooltipTemplate: "<%= datasetLabel %> : <%= value %> Orang",
			}
	



            
            // get bar chart canvas
            var canvas= $("#canvas").get(0).getContext("2d");
            // draw pie chart
            new Chart(canvas).Bar(barData, barOptions);


            // pie chart data

			//var total = <?php echo array_sum($dataDiagram2) ?>;
            var pieData = [
                {
                    value: <?=$dataDiagram2[0]?>,
                    color:"#878BB6",
					highlight: "rgba(120,187,205,0.5)",
					label: ['<?=$lblDiagram2[0]?>', '<?=round($dataDiagram2[0]/array_sum($dataDiagram2)*100)?>']
                },
                {
                    value : <?=$dataDiagram2[1]?>,
                    color : "#4ACAB4",
					highlight: "rgba(120,187,205,0.5)",
					label: ['<?=$lblDiagram2[1]?>', '<?=round($dataDiagram2[1]/array_sum($dataDiagram2)*100)?>']
                },
                {
                    value : <?=$dataDiagram2[2]?>,
                    color : "#FF7F74",
					highlight: "rgba(120,187,205,0.5)",
					label: ['<?=$lblDiagram2[2]?>', '<?=round($dataDiagram2[2]/array_sum($dataDiagram2)*100)?>']
                },
                {
                    value : <?=$dataDiagram2[3]?>,
                    color : "#E67817",
					highlight: "rgba(120,187,205,0.5)",
					label: ['<?=$lblDiagram2[3]?>', '<?=round($dataDiagram2[3]/array_sum($dataDiagram2)*100)?>']
                },
                {
                    value : <?=$dataDiagram2[4]?>,
                    color : "red",
					highlight: "rgba(120,187,205,0.5)",
					label: ['<?=$lblDiagram2[4]?>', '<?=round($dataDiagram2[4]/array_sum($dataDiagram2)*100)?>']
                }

            ];
            // pie chart options
           	var pieOptions = 
	        {
	            tooltipTemplate: "Keluarga <%=label[0]%> : <%= label[1] %>%",
	            
	            // onAnimationComplete: function()
	            // {
	            //     this.showTooltip(this.segments, true);
	            // },

	            tooltipEvents: ["mousemove", "touchstart", "touchmove"],
	            
	            showTooltips: true
	        }

	        // get pie chart canvas
            var ekonomi= $("#canvas2").get(0).getContext("2d");
            // draw pie chart
            new Chart(ekonomi).Pie(pieData, pieOptions);
</script>