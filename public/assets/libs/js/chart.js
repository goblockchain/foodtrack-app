let chartReportSalesCTX = document.getElementById('chartReport').getContext('2d');

let chartReportSales = new Chart(chartReportSalesCTX, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Vendas',
            data: [],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Relatório de visitas por período'
        },
        tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
                label: function(tooltipItems, data) {
                    return `Total de visitas ${ JSON.stringify(data) }`
                },
                /*title: function(tooltipItems, data) {
                    return `Total de numero 2`
                }*/
            }
        },
    }
});


let getChartReportSales = async () => {
    let dataInicial = $("#inputDataInicial").val()
    let dataFinal = $("#inputDataFinal").val()
    let productId = $("#inputProductId").val()
    chartReportSales.data.labels = [];
    $.ajax({
        url: `/admin/chart/getVisits?date_start=${dataInicial}&date_end=${dataFinal}&product_id=${productId}`,
        type: 'get'
    }).done((r) => {

        for (let i = 0; i < r.length; i++) {
            chartReportSales.data.labels[i] = moment(r[i].day).format('DD/MM/YYYY')
            chartReportSales.data.datasets[0].data[i] = r[i].total
        }
        chartReportSales.update()
    })
}



$("#submitReportSales").submit(function (e) {
    e.preventDefault();

    getChartReportSales()

    return false
})



getChartReportSales()
