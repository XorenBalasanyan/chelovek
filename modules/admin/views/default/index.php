<div class="hero-unit">
	<!--h1></h1-->
	<p>Система «Эльви» запущена и ждет распоряжений.</p>
	<!--p><a class="btn btn-primary btn-large">Learn more</a></p-->
</div>

<div class="row-fluid">
	<div class="span12">
		<div id="hchart_chlvk" style="width: 100%; height: 400px;"></div>
	</div>
</div>

<script src="/js/highcharts.js"></script>
<script>
$(function(){

	var s = <?=json_encode($s)?>,
		chartopts = {
			chart: {type: 'line', marginBottom: 100, backgroundColor: null},
			title: {text: 'Статистика chelovek.com.ua', x: -20},
			credits: {enabled : false},
			xAxis: {categories: s.chlvk.labels},
			yAxis: {title: {text: 'Количество'}, min: 0, plotLines: [{value: 0, width: 1, color: '#999'}]},
			legend: {layout: 'horizontal', align: 'center', verticalAlign: 'top', x: -20, y: 30, borderWidth: 0},
			plotOptions: {line: {dataLabels: {enabled: true}, enableMouseTracking: false}},
			series: [
				{name: 'Визиты', color: '#900', data: s.chlvk.visits},
				{name: 'Новые посетители', color: '#090', data: s.chlvk.new_visitors},
				{name: 'Посетители', color: '#909', data: s.chlvk.visitors}
			]
		};
	$('#hchart_chlvk').highcharts(chartopts);
});
</script>
