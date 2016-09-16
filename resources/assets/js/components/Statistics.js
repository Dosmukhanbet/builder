import Chart from 'chart.js';

export default {
	template: '<canvas width="300"  height="200" id="myChart"></canvas>',
	props: ['labels', 'values'],

	ready() {
		var data = {
    labels: [ "Клиенты", "Мастера","Заявки"],
    datasets: [
        {
            label: "Зарегистрированные пользователи / Опубликованные заявки",
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            data: [2632,1325,3234],
        }
    ]
};
		var ctx = document.getElementById("myChart").getContext("2d");

		new Chart(ctx, {
			type: 'bar',
			data: data
		});
	}
};