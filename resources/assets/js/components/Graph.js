import Chart from 'chart.js';

export default {
	template: '<canvas width="400"  height="300" id="myChart"></canvas>',
	props: ['labels', 'values'],

	ready() {
		var data = {
			labels: this.labels,
			datasets: [{
				data: this.values,
				backgroundColor: [
					"#FF6384",
					"#CCCCCC",
					"#FFCE56"
				],
				hoverBackgroundColor: [
					"#FF6384",
					"#CCCCCC",
					"#FFCE56"
				]
			}]
		};
		var ctx = document.getElementById("myChart").getContext("2d");

		new Chart(ctx, {
			type: 'doughnut',
			data: data
		});
	}
};