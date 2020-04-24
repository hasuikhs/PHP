function search() {
    $.ajax({
        url: "ajax.php",
        type: "get",
        data: {
            ps: $("#ps").val(),
            pe: $("#pe").val(),
        }
    }).done(function(data) {
        const obj = JSON.parse(data)

        x_data = obj.date
        click_data = obj.click
        mal03 = obj.mal03
        mal05 = obj.mal05

        chart(x_data, click_data, mal03, mal05)

    }).fail(function() {
        alert("올바르지 않은 요청")
    });
}

function chart(x_data, click_data, mal03, mal05) {
    var today = new Date()
    var chart = c3.generate({
        bindto: '#chart',
        data: {
            x: 'x',
            columns: [
                x_data,
                click_data,
                mal03,
                mal05
            ],
            regions: {
                'mal03': [{ 'end': today, 'style': 'dashed' }],
                'mal05': [{ 'end': today, 'style': 'dashed' }],
            },
            type: 'spline',
            connectNull: false
        },
        point: {
            show: false
        },
        axis: {
            x: {
                type: 'timeseries',
                tick: {
                    format: '%m-%d'
                }
            }
        },
        zoom: {
            enabled: true
        }
    })
}