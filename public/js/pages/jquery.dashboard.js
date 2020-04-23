
/**
* Theme: Zircos  Admin Template
* Author: Coderthemes
* Dashboard
*/

!function($) {
    "use strict";

    var Dashboard1 = function() {
    	this.$realData = []
    };

    //creates Bar chart
    Dashboard1.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.2,
            barColors: lineColors,
            postUnits: 'k'
        });
    },

    //creates line chart
    Dashboard1.prototype.createLineChart = function(element, data, xkey, ykeys, labels, opacity, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Line({
          element: element,
          data: data,
          xkey: xkey,
          ykeys: ykeys,
          labels: labels,
          fillOpacity: opacity,
          pointFillColors: Pfillcolor,
          pointStrokeColors: Pstockcolor,
          behaveLikeLine: false,
          gridLineColor: '#eef0f2',
          hideHover: 'auto',
          resize: true, //defaulted to true
          pointSize: 0,
          lineColors: lineColors,
            postUnits: 'k'
        });
    },

    //creates Donut chart
    Dashboard1.prototype.createDonutChart = function(element, data, colors) {
        Morris.Donut({
            element: element,
            data: data,
            resize: true, //defaulted to true
            colors: colors
        });
    },

    
    Dashboard1.prototype.init = function() {

        //creating bar chart
        var $barData  = [
            { label: 'Bagudo', population: 42, male: 57, female: 75 },
            { label: 'Bahindi', population: 75, male: 57, female: 75 },
            { label: 'Zagga', population: 38, male: 57, female: 75 },
            { label: 'Kaoje', population: 19, male: 57, female: 75 },
            { label: 'Illo', population: 93, male: 57, female: 75 }
        ];
        this.createBarChart('morris-bar-example', $barData, 'label', ['population','male','female'], ['Population','Male','Female'], ['#3bafda','#111111','#222222']);

        //create line chart
        var $data  = [
            { label: '2002', malaria: 50, typhoid: 53, ultha: 35, asma: 54, diabetes: 65},
            { label: '2003', malaria: 50, typhoid: 1, ultha: 12, asma: 85, diabetes: 96},
            { label: '2004', malaria: 50, typhoid: 0, ultha: 35, asma: 85, diabetes: 96},
            { label: '2005', malaria: 50, typhoid: 36, ultha: 14, asma: 84, diabetes: 96},
            { label: '2006', malaria: 50, typhoid: 0, ultha: 35, asma: 85, diabetes: 64},
            { label: '2007', malaria: 50, typhoid: 8, ultha: 18, asma: 54, diabetes: 96},
            { label: '2008', malaria: 50, typhoid: 90, ultha: 35, asma: 85, diabetes: 96},
            { label: '2009', malaria: 75, typhoid: 50, ultha: 83, asma: 73, diabetes: 96 },
            { label: '2010', malaria: 30, typhoid: 80, ultha: 35, asma: 130, diabetes: 85 },
            { label: '2011', malaria: 50, typhoid: 189, ultha: 83, asma: 6, diabetes: 96 },
            { label: '2012', malaria: 75, typhoid: 10, ultha: 35, asma: 85, diabetes: 74 },
            { label: '2013', malaria: 50, typhoid: 40, ultha: 36, asma: 85, diabetes: 176 },
            { label: '2014', malaria: 75, typhoid: 50, ultha: 52, asma: 1, diabetes: 96 },
            { label: '2015', malaria: 100, typhoid: 70, ultha: 35, asma: 85, diabetes: 28 },
            { label: '2016', malaria: 156, typhoid: 10, ultha: 35, asma: 74, diabetes: 96 },
            { label: '2017', malaria: 100, typhoid: 70, ultha: 63, asma: 85, diabetes: 74 },
            { label: '2018', malaria: 100, typhoid: 70, ultha: 35, asma: 1, diabetes: 96 },
            { label: '2019', malaria: 100, typhoid: 70, ultha: 5, asma: 85, diabetes: 132 },
            { label: '2020', malaria: 100, typhoid: 70, ultha: 35, asma: 85, diabetes: 63 }
          ];
        this.createLineChart('morris-lines-example', $data, 'label', ['malaria','typhoid','ultha','asma','diabetes'], 
        ['Malaria','Typhoid','Ultha','Asma','Diabetes'],['0.9'],['#ffffff'],['#999999'], ['#10c469','#188ae2','#10d474','#10e649','#28f469']);

        //creating donut chart
        var $donutData = [
                {label: "Download Sales", value: 12},
                {label: "In-Store Sales", value: 30},
                {label: "Mail-Order Sales", value: 20}
            ];
        this.createDonutChart('morris-donut-example', $donutData, ['#3ac9d6', '#f5707a', "#4bd396"]);
    },
    //init
    $.Dashboard1 = new Dashboard1, $.Dashboard1.Constructor = Dashboard1
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.Dashboard1.init();
}(window.jQuery);