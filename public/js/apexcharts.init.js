(Apex.grid = { padding: { right: 0, left: 0 } }),
    (Apex.dataLabels = { enabled: !1 });
colors = ["#6658dd", "#1abc9c", "#CED4DC"];
(dataColors = $("#apex-column-1").data("colors")) &&
    (colors = dataColors.split(","));
options = {
    chart: { height: 380, type: "bar", toolbar: { show: !1 } },
    plotOptions: {
        bar: { horizontal: !1, endingShape: "rounded", columnWidth: "55%" },
    },
    dataLabels: { enabled: !1 },
    stroke: { show: !0, width: 2, colors: ["transparent"] },
    colors: colors,
    series: [
        { name: "Laptop", data: [44, 55, 57, 56, 61, 58, 63, 60, 66] },
        { name: "Computer", data: [76, 85, 101, 98, 87, 105, 91, 114, 94] },
        { name: "Printer", data: [35, 41, 36, 26, 45, 48, 52, 53, 41] },
        { name: "Proyektor", data: [19, 12, 20, 32, 21, 65, 32, 22, 11] },
    ],
    xaxis: {
        categories: [
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
        ],
    },
    legend: { offsetY: 5 },
    yaxis: { title: { text: "Rp (rupiah)" } },
    fill: { opacity: 1 },
    grid: {
        row: { colors: ["transparent", "transparent"], opacity: 0.2 },
        borderColor: "#f1f3fa",
        padding: { bottom: 10 },
    },
    tooltip: {
        shard: !0,
        intersect: !1,
        y: {
            formatter: function (e) {
                return "Rp " + e + " rupiah";
            },
        },
    },
};
(chart = new ApexCharts(
    document.querySelector("#apex-column-1"),
    options
)).render();
