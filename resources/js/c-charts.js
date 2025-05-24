var chartDom = document.getElementById("barChart");

if (chartDom) {
    var barChart = echarts.init(chartDom);

    var barOption = {
        tooltip: { trigger: "axis" },
        xAxis: {
            type: "category",
            data: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            axisLine: { lineStyle: { color: "#ccc" } },
            axisLabel: {
                fontFamily: "Jost, sans-serif", // ✅ Apply Jost font
                fontSize: 14,
                color: "#333",
            },
        },
        yAxis: {
            type: "value",
            axisLine: { lineStyle: { color: "#ccc" } },
            axisLabel: {
                fontFamily: "Jost, sans-serif", // ✅ Apply Jost font
                fontSize: 14,
                color: "#333",
            },
        },
        series: [
            {
                name: "Total Spent",
                type: "bar",
                data: [50, 100, 75, 125, 50, 200, 100, 150, 50, 180, 30, 90],
                barWidth: "50%",
                itemStyle: {
                    borderRadius: [5, 5, 0, 0], // Rounded bar effect
                    color: "#6758f3", // Purple color
                },
                label: {
                    show: false, // ✅ Hide numbers on bars
                    fontFamily: "Jost, sans-serif", // ✅ Apply Jost font to labels
                    fontSize: 14,
                    color: "#fff",
                },
            },
        ],
    };

    barChart.setOption(barOption);
    
    // ✅ Resize chart on window resize
    window.addEventListener("resize", function () {
        barChart.resize();
    });
}

// ✅ Check if `fullDonutChart` exists before initializing
var chartDom2 = document.getElementById("fullDonutChart");

if (chartDom2) {
    var donutChart = echarts.init(chartDom2);

    var donutOption = {
        title: {
            text: "80%",
            subtext: "Transactions",
            left: "center",
            top: "40%",
            textStyle: { fontSize: 24, fontWeight: "bold", fontFamily: "Jost, sans-serif" },
            subtextStyle: { fontSize: 14, color: "#666", fontFamily: "Jost, sans-serif" },
        },
        legend: {
            bottom: 30,
            left: "center",
            itemGap: 20,
            textStyle: { fontSize: 14, fontFamily: "Jost, sans-serif" },
        },
        series: [
            {
                type: "pie",
                radius: ["60%", "80%"],
                center: ["50%", "45%"],
                label: { show: false },
                itemStyle: {
                    borderRadius: 10,
                    borderWidth: 2,
                    borderColor: "#fff",
                },
                animationDuration: 1500,
                animationEasing: "cubicOut",
                data: [
                    { value: 40, name: "Sale", itemStyle: { color: "#4a90e2" } }, // Blue
                    { value: 30, name: "Distribute", itemStyle: { color: "#f5c341" } }, // Yellow
                    { value: 30, name: "Return", itemStyle: { color: "#ff6b5a" } }, // Red
                ],
            },
        ],
    };

    donutChart.setOption(donutOption);
    
    // ✅ Resize chart on window resize
    window.addEventListener("resize", function () {
        donutChart.resize();
    });
}
