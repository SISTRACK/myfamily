
/**
* Theme: Zircos Admin Template
* Author: Coderthemes
* Morris Chart
*/

!function($) {
    "use strict";

    var MorrisCharts = function() {};

    //creates line chart
    MorrisCharts.prototype.createLineChart = function(element, data, xkey, ykeys, labels, opacity, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Line({
          element: element,
          data: data,
          xkey: xkey,
          ykeys: ykeys,
          labels: labels,
          fillOpacity: opacity,
          pointFillColors: Pfillcolor,
          pointStrokeColors: Pstockcolor,
          behaveLikeLine: true,
          gridLineColor: '#eef0f2',
          hideHover: 'auto',
          lineWidth: '3px',
          pointSize: 0,
          preUnits: '$',
          resize: true, //defaulted to true
          lineColors: lineColors
        });
    },
    //creates area chart
    MorrisCharts.prototype.createAreaChart = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 0,
            lineWidth: 0,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true,
            gridLineColor: '#eef0f2',
            lineColors: lineColors
        });
    },
    //creates area chart with dotted
    MorrisCharts.prototype.createAreaChartDotted = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 3,
            lineWidth: 1,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            pointFillColors: Pfillcolor,
            pointStrokeColors: Pstockcolor,
            resize: true,
            smooth: false,
            gridLineColor: '#eef0f2',
            lineColors: lineColors
        });
    },
    //creates Bar chart
    MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.4,
            xLabelAngle: 35,
            barColors: lineColors
        });
    },
    //creates Stacked chart
    MorrisCharts.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            stacked: true,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barColors: lineColors
        });
    },
    //creates Donut chart
    MorrisCharts.prototype.createDonutChart = function(element, data, colors) {
        Morris.Donut({
            element: element,
            data: data,
            resize: true, //defaulted to true
            colors: colors
        });
    },
    MorrisCharts.prototype.init = function() {

        //create line chart
        var $data  = [
            { label: '2008', malaria: 50, typhoid: 0 , cancer: 54, athma: 26},
            { label: '2009', malaria: 75, typhoid: 50, cancer: 54, athma: 26 },
            { label: '2010', malaria: 30, typhoid: 80, cancer: 54, athma: 26 },
            { label: '2011', malaria: 50, typhoid: 50, cancer: 54, athma: 26 },
            { label: '2012', malaria: 75, typhoid: 10, cancer: 54, athma: 26 },
            { label: '2013', malaria: 50, typhoid: 40, cancer: 54, athma: 26 },
            { label: '2014', malaria: 75, typhoid: 50, cancer: 54, athma: 26 },
            { label: '2015', malaria: 100, typhoid: 70, cancer: 54, athma: 26 }
          ];
        this.createLineChart('morris-line-example', $data, 'label', ['malaria', 'typhoid','cancer','athma'], ['Malaria', 'Typhoid','Cancer','Athma'],['0.1'],['#ffffff'],['#999999'], ['#188ae2', '#4bd396']);

        //creating area chart
        var $areaData = [
            { label: '2009', admission: 10, graduation: 20 },
            { label: '2010', admission: 75,  graduation: 65 },
            { label: '2011', admission: 50,  graduation: 40 },
            { label: '2012', admission: 75,  graduation: 65 },
            { label: '2013', admission: 50,  graduation: 40 },
            { label: '2014', admission: 75,  graduation: 65 },
            { label: '2015', admission: 90, graduation: 60 }
        ];
        this.createAreaChart('morris-area-example', 0, 0, $areaData, 'label', ['admission', 'graduation'], ['Admissions', 'Graduation'], ['#8d6e63', "#bdbdbd"]);

        //creating area chart with dotted
        var $areaDotData = [
            { y: '2009', a: 10, b: 20 },
            { y: '2010', a: 75,  b: 65 },
            { y: '2011', a: 50,  b: 40 },
            { y: '2012', a: 75,  b: 65 },
            { y: '2013', a: 50,  b: 40 },
            { y: '2014', a: 75,  b: 65 },
            { y: '2015', a: 90, b: 60 }
        ];
        this.createAreaChartDotted('morris-area-with-dotted', 0, 0, $areaDotData, 'y', ['a', 'b'], ['Series A', 'Series B'],['#ffffff'],['#999999'], ['#6b5fb5', "#bdbdbd"]);

        //creating bar chart
        var $barData  = [
            { label: '2009', bagudo: 100, bahindi: 90, zagga: 40, kaoje: 57, illo: 65 },
            { label: '2010', bagudo: 75,  bahindi: 65, zagga: 20, kaoje: 57, illo: 65 },
            { label: '2011', bagudo: 50,  bahindi: 40, zagga: 50, kaoje: 57, illo: 65 },
            { label: '2012', bagudo: 75,  bahindi: 65, zagga: 95, kaoje: 57, illo: 65 },
            { label: '2013', bagudo: 50,  bahindi: 40, zagga: 22, kaoje: 57, illo: 65 },
            { label: '2014', bagudo: 75,  bahindi: 65, zagga: 56, kaoje: 57, illo: 65 },
            { label: '2015', bagudo: 100, bahindi: 90, zagga: 60, kaoje: 57, illo: 65 }
        ];
        this.createBarChart('morris-bar-example', $barData, 'label', ['bagudo', 'bahindi', 'zagga','kaoje','illo'], ['Bagudo', 'Bahindi', 'Zagga','Kaoje','Illo'], ['#3ac9d6', '#ff9800', "#f5707a"]);

        //creating Stacked chart
        var $stckedData  = [
            { y: '2005', a: 45, b: 180 },
            { y: '2006', a: 75,  b: 65 },
            { y: '2007', a: 100, b: 90 },
            { y: '2008', a: 75,  b: 65 },
            { y: '2009', a: 100, b: 90 },
            { y: '2010', a: 75,  b: 65 },
            { y: '2011', a: 50,  b: 40 },
            { y: '2012', a: 75,  b: 65 },
            { y: '2013', a: 50,  b: 40 },
            { y: '2014', a: 75,  b: 65 },
            { y: '2015', a: 100, b: 90 }
        ];
        this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#26a69a', '#ebeff2']);

        //creating donut chart
        var $donutData = [
                {label: "Electricity", value: 12},
                {label: "Financial", value: 30},
                {label: "Markets", value: 20}
            ];
        this.createDonutChart('morris-donut-example', $donutData, ['#4bd396', '#ebeff2', "#3ac9d6"]);
    },
    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.MorrisCharts.init();
}(window.jQuery);