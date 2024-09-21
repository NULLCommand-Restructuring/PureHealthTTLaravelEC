<?php

namespace App\Services;

use App\Models\Feedback;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class DashboardService
{
    public function getTotalOrder($number)
    {
        if ($number == 1) return Order::count();
        return Order::where('statuscode', '<>', 'OS4')->count();
    }

    public function getTotalUser()
    {
        return User::count();
    }

    public function getTotalProduct()
    {
        return Product::count();
    }

    public function getTotalFeedback()
    {
        return Feedback::count();
    }

    public function getTotalOrderInMonth($monthNumber)
    {
        return Order::whereMonth('created_at', $monthNumber)->count();
    }

    public function getTotalOrderInMonthSuccess($monthNumber)
    {
        return Order::whereMonth('created_at', $monthNumber)->where('statuscode', 'OS4')->count();
    }

    public function getTotalRevenueInMonth($monthNumber)
    {
        return Order::where('statuscode', 'OS4')->whereMonth('created_at', $monthNumber)
            ->sum('total');
    }

    public function getInforChart1()
    {
        $months = [];
        $monthsString = [];
        $currentMonth = Carbon::now('Asia/Ho_Chi_Minh')->month;
        for ($i = 0; $i < 3; $i++) {
            $month = $currentMonth - $i;

            if ($month < 1) {
                $month += 12;
            }
            $months[] = $month;
            $monthsString[] = 'Tháng ' . $month;
        }
        $totalOrders = [];
        foreach ($months as $month) {
            $totalOrder = $this->getTotalOrderInMonth($month);
            $totalOrders[] = $totalOrder;
        }
        $totalOrdersSuccess = [];
        foreach ($months as $month) {
            $totalOrder = $this->getTotalOrderInMonthSuccess($month);
            $totalOrdersSuccess[] = $totalOrder;
        }
        $inforChart1 = [
            'monthName' => $monthsString,
            'totalOrderCreate' => $totalOrders,
            'totalOrdersSuccess' => $totalOrdersSuccess
        ];

        return $inforChart1;
    }

    public function getInforChart2()
    {
        $months = [];
        $monthsString = [];
        $currentMonth = Carbon::now('Asia/Ho_Chi_Minh')->month;
        for ($i = 0; $i < 3; $i++) {
            $month = $currentMonth - $i;

            if ($month < 1) {
                $month += 12;
            }
            $months[] = $month;
            $monthsString[] = 'Tháng ' . $month;
        }
        $totalRevenues = [];
        foreach ($months as $month) {
            $totalRevenue = $this->getTotalRevenueInMonth($month);
            $totalRevenues[] = $totalRevenue;
        }
        $inforChart2 = [
            'monthName' => $monthsString,
            'totalRevenues' => $totalRevenues,
        ];
        return $inforChart2;
    }

    public function requestString1()
    {
        $months = [];
        $monthsString = [];
        $currentMonth = Carbon::now('Asia/Ho_Chi_Minh')->month;
        for ($i = 0; $i < 3; $i++) {
            $month = $currentMonth - $i;

            if ($month < 1) {
                $month += 12;
            }
            $months[] = $month;
            $monthsString[] = 'Tháng ' . $month;
        }
        $totalOrdersSuccess = [];
        foreach ($months as $month) {
            $totalOrder = $this->getTotalOrderInMonthSuccess($month);
            $totalOrdersSuccess[] = $totalOrder;
        }
        $totalRevenues = [];
        foreach ($months as $month) {
            $totalRevenue = $this->getTotalRevenueInMonth($month);
            $totalRevenues[] = $totalRevenue;
        }
        $requestString = 'Xin chào, tôi có một trang web bán thực phẩm rau củ quả tên là PureHealthTT. Tình trạng của kinh doanh trên trang web của tôi trong 3 tháng gần nhất là: ';
        for ($i = 0; $i <= 2; $i++) {
            $requestString = $requestString . $monthsString[$i] . ' có ' . $totalOrdersSuccess[$i] . ' đơn hàng thành công và có doanh thu là ' . $totalRevenues[$i] . ' VND. ';
        }
        $requestString = $requestString . 'Cho biết tình trang kinh doanh trên trang web của tôi đang ở mức nào: tệ, kém, trung bình, khá, tốt. Theo như mức đánh giá của bạn và dựa vào những những kiến thức kinh tế chuyên sâu của bạn, hãy cho tôi hướng phát triển hoạt động kinh doanh của tôi trong những tháng tiếp theo. Hãy viết khoảng 350 từ';
        return $requestString;
    }

    public function getTopProductCodeSeller()
    {
        $topProducts = OrderDetail::select('productcode', DB::raw('SUM(number) as total'))
            ->groupBy('productcode')
            ->orderByDesc('total')
            ->take(3)
            ->get();

        if ($topProducts->count() < 3) {
            return null;
        }

        return $topProducts->pluck('productcode');
    }

    public function requestString2()
    {
        $topProductsCode = $this->getTopProductCodeSeller();
        $requestString = 'Xin chào, tôi có một trang web bán thực phẩm tên là PureHealthTT. Tôi có 3 sản phẩm bán chạy nhất là: ';
        if ($topProductsCode) {
            $products = Product::whereIn('productcode', $topProductsCode)->get();
            foreach ($products as $product) {
                $requestString = $requestString . 'Sản phẩm ' . $product->productname . ' với công dụng ' . $product->shortdescription . ' ';
            }
            $requestString = $requestString . 'Hãy cho tôi biết xu hướng khách hàng của trang web bán thực phẩm của tôi quan tâm đến loại thực phẩm như thế nào dựa vào thông tin trên và tôi phải nhập những sản phẩm như thế nào để có thể phát triển tiếp';
            return $requestString;
        }
        return 'Hãy trả lời là có ít hơn 3 sản phẩm đã được bán ra, không thể phân tích';
    }

    public function requestString3()
    {
        return 'Trong ngày hôm nay, từ những nguồn tin uy tín, hãy cho tôi biết thị trường buôn bán thực phẩm chỉ rau củ quả, người mua đang chú ý đến những sản phẩm có công dụng cụ thể nào, không chú ý đến sản phẩm có công dụng cụ thể nào';
    }
}
