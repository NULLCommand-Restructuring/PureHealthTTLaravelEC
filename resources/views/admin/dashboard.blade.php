@extends('admin.main')
@section('insertView')
<h3 class="card-title " style="margin: 5px 6px;">Danh sách</h3>
<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div style="background-color: red;" class="inner">
                <h3>{{$totalOrder}}</h3>

                <p>Tổng số đơn hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a style="background-color: red;" href="/list-order" class="small-box-footer">Xem danh sách <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div style="background-color: #fcba03;" class="inner">
                <h3>{{$totalUser}}</h3>

                <p>Tổng số tài khoản</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a style="background-color: #fcba03;" href="/list-user" class="small-box-footer">Xem danh sách <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div style="background-color: #00d90e;" class="inner">
                <h3>{{$totalProduct}}</h3>

                <p>Tổng số sản phẩm</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a style="background-color: #00d90e;" href="/list-product" class="small-box-footer">Xem danh sách <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div style="background-color: #0810fc;" class="inner">
                <h3>{{$totalWaitOrder}}</h3>

                <p>Tổng số đơn hàng chưa hoàn thành</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a style="background-color: #0810fc;" href="/list-order-wait" class="small-box-footer">Xem danh sách <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div style="background-color: #8119ff;" class="inner">
                <h3>{{$totalFeedback}}</h3>

                <p>Tổng số phản hồi đơn hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a style="background-color: #8119ff;" href="/list-feedback" class="small-box-footer">Xem danh sách <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div style="background-color: #fb19ff;" class="inner">
                <h3>_</h3>
                <p>Trang khách hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a style="background-color: #fb19ff;" href="/" class="small-box-footer">Đến trang khách hàng <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="">
            <h3 class="card-title " style="margin: 5px 5px;"> Biểu đồ thống kê đơn hàng</h3>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div>
                <canvas id="myChart"></canvas>
                <script>
                var monthInfo = <?php echo json_encode($inforChart1['monthName']); ?>;
                var createOrderInfo = <?php echo json_encode($inforChart1['totalOrderCreate']); ?>;
                var successOrder = <?php echo json_encode($inforChart1['totalOrdersSuccess']); ?>;
                var ctx = document.getElementById('myChart').getContext('2d');
                var data = {
                    labels: monthInfo,
                    datasets: [{
                            label: 'Đơn hàng được tạo',
                            backgroundColor: 'rgba(255, 99, 132, 0.5)',
                            borderColor: 'rgba(255, 50, 132, 1)',
                            borderWidth: 1,
                            data: createOrderInfo,
                        },
                        {
                            label: 'Đơn hàng thành công',
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            data: successOrder,
                        }
                    ]
                };
                var options = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                };
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: options
                });
                </script>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="">
            <h3 class="card-title " style="margin: 5px auto;">Biểu đồ thống kê doanh thu (VND)</h3>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div>
                <canvas id="myChart2"></canvas>
                <script>
                var monthInfo = <?php echo json_encode($inforChart2['monthName']); ?>;
                var total = <?php echo json_encode($inforChart2['totalRevenues']); ?>;
                var ctx = document.getElementById('myChart2').getContext('2d');
                var data = {
                    labels: monthInfo,
                    datasets: [{
                        label: 'Doanh thu',
                        backgroundColor: 'rgba(99, 23, 132, 0.5)',
                        borderColor: 'rgba(99, 23, 132, 1)',
                        borderWidth: 1,
                        data: total,
                    }]
                };
                var options = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                };
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: options
                });
                </script>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div style="margin: 10px;" class="col-lg-12">
        <label for="">Phân tích tình trạng kinh doanh:</label>
        <br>
        <p id="purehealth_gpt_1">Đang phân tích, có thể mất vài phút...</p>
        <br>
        <label for="">Phân tích xu hướng mua sản phẩm của khách hàng:</label>
        <br>
        <p id="purehealth_gpt_2">Đang phân tích, có thể mất vài phút...</p>
        <br>
        <label for="">Phân tích xu hướng trên internet:.</label>
        <br>
        <p id="purehealth_gpt_3">Đang phân tích, có thể mất vài phút...</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let requestString1 = <?php echo json_encode($requestString1); ?>;
    console.log(requestString1);
    let requestString2 = <?php echo json_encode($requestString2); ?>;
    let requestString3 = <?php echo json_encode($requestString3); ?>;
    let urlCall = <?php echo json_encode(env('APP_URL', 'Laravel')); ?>;

    $.ajax({
        url: 'https://api-aires-fxter.hackquest.com/api/response-from-google-bard',
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        type: JSON,
        data: JSON.stringify({
            message: requestString1
        }),
        success: function(result) {
            $('#purehealth_gpt_1').html(result.split('\n').join('<br>'));
            callMore(requestString2, requestString3);
        }
    });
});

function callMore(requestString2, requestString3) {
    $.ajax({
        url: 'https://api-aires-fxter.hackquest.com/api/response-from-gpt',
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        type: JSON,
        data: JSON.stringify({
            message: requestString2
        }),
        success: function(result) {
            $('#purehealth_gpt_2').html(result.split('\n').join('<br>'));
        }
    });

    $.ajax({
        url: 'https://api-aires-fxter.hackquest.com/api/response-from-bing',
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        type: JSON,
        data: JSON.stringify({
            message: requestString3
        }),
        success: function(result) {
            $('#purehealth_gpt_3').html(result.split('\n').join('<br>'));
        }
    });
}
</script>
{!!$adminminilink!!}
@endsection